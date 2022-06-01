const app = require('express')();
const bodyParser = require('body-parser');
const cors = require('cors');
const apiRest= require('./apiRest');

app.use(bodyParser.json());
app.use(cors());


if (app.get('env') === 'production') {
    app.set('trust proxy', 1);
    session.cookie.secure = true;
}
const mysql = require('mysql');
const con = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'test_ivs_jean'
});
con.connect(err => {
    if (err) {
        console.log('error when connecting to db:', err);
        setTimeout(preventDisconnect, 5000);
    } else {
        console.log('Connexion effectuée');

        app.get('/OrganisationList', function (req, res) {
            apiRest.GetOrganisationList( con, res);
        });

        app.get('/GetBuildingListof', function (req, res) {
            let url = new URL(req.protocol + '://' + req.get('host') + req.originalUrl);
            apiRest.GetBuildingListof(url.searchParams.get("OrganisationName"), con, res);
        });

        app.get('/GetRoomof', function (req, res) {
            let url = new URL(req.protocol + '://' + req.get('host') + req.originalUrl);
            apiRest.GetRoomOf(url.searchParams.get("BuildingName"), con, res);
        });
        app.get('/PeopleIn', function (req, res) {
            let url = new URL(req.protocol + '://' + req.get('host') + req.originalUrl);
            let type=url.searchParams.get("type");
            let name=url.searchParams.get("name");
            if (type&&name){
            apiRest.PeopleIn(type,name, con, res);
            }
        });
    }
});


if (app.listen(process.env.PORT || 8080)) {
    console.log('Serveur lancé sur le port 8080');
}
