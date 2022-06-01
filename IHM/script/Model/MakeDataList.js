async function FetchRequest(url){
    let init={
        headers:{
            'Accept': 'application/json',
        },
        method: "GET"
    }
    let res=await fetch(url,init);
    return await res.json();
}

async function Labellist2(type, of) {
    let LabelList=[];
    let url ;
    switch (type) {
        case 'Organisation':
             url='https://localhost:8000/api/organisations';
            break;
        case 'Building':
            url='https://localhost:8000/api/buildingof/'+of;
            break
        case'Piece':
            url='https://localhost:8000/api/pieceOf/'+of;
            break;
    }
    let data= await FetchRequest(url);
    for (i of data) {
        LabelList.push(i['nom']);
    }
    return LabelList;
}

async function PeopleInlist2(of,name) {
    let PeopleIn=[];
    let url;
    for (n of name) {
        url = 'https://localhost:8000/api/PeopleIn/' + of + '/' + n;
        let data =await FetchRequest(url);
        PeopleIn.push(data[0]['personnesPresentes']);
    }
    return PeopleIn;

}

async function getdata(type,of){
    let label= await Labellist2(type,of);
    let dataPacket={
        labels:label,
        datasets:[{
            label:'Personnes présente',
            data:await PeopleInlist2(type,label),
        }]
    };
    return dataPacket;
}

