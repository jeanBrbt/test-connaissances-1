  module.exports.GetOrganisationList = function (con, res) {
    con.query("SELECT `nom` FROM `organisation` ", (err, re) =>{
      if(err){
        throw err;
      }
      res.json({organisationList: re});
    });
  }
  module.exports.GetBuildingListof = function (organisationName, con, res) {
    con.query('SELECT building.nom FROM organisation  LEFT JOIN building  on building.id_organisation = organisation.id WHERE organisation.nom=?;',organisationName, (err, re) =>{
      if(err){
        throw err;
      }
      res.json({buildinglist: re});
    });
  }
  module.exports.GetRoomOf = function (buildingName,con, res) {
    con.query('SELECT piéces.nom FROM building LEFT JOIN piéces on piéces.id_building = building.id WHERE building.nom=?',buildingName, (err, re) =>{
      if(err){
        throw err;
      }
      res.json({Roomlist: re});
    });
  }
  module.exports.PeopleIn = function (type,name,con, res) {
      switch(type){
        case "Organisation":
            con.query('SELECT SUM(piéces.NbPersonnesPresente) FROM organisation LEFT JOIN building on building.id_organisation = organisation.id LEFT JOIN piéces on piéces.id_building = building.id WHERE organisation.nom=?',name, (err, re) =>{
                if(err){
                  throw err;
                }
                res.json({PeopleIn: re});
              });
            break;
        case "Building":
            con.query('SELECT SUM(piéces.NbPersonnesPresente) FROM Building LEFT JOIN piéces on piéces.id_building = building.id WHERE building.nom=?',name, (err, re) =>{
                if(err){
                  throw err;
                }
                res.json({PeopleIn: re});
              });
              break;
        case "Room":
            con.query('SELECT `NbPersonnesPresente` FROM `piéces` WHERE `nom`=?',name, (err, re) =>{
                if(err){
                  throw err;
                }
                res.json({PeopleIn: re});
              });
              break;
                
      }
  }
