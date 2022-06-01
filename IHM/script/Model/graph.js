function updatedata (config,graph,type,of){
    loading(config,graph);
    getdata(type,of).then(data=>{
        config.data=data;

        switch (type){
            case "Organisation":
                config.options.plugins.title.text="Personnes présente dans les Organisations";
                break;
            case  "Building":
                config.options.plugins.title.text="Personnes présente dans les buildings de l'Organisation: "+of;
                break;
            case "Piece":
                config.options.plugins.title.text="Personnes présente dans les piéces du building :"+of;
                break;
            default:
                break;
        }
        config.data.customType=type;
        graph.update();
    });
    return config;
}
function loading(config,graph){
    config.data={
        labels:[],
        datasets:[{
            label:'Chargement',
            data:[]
        }]
    }
    config.options.plugins.title.text='chargement';
graph.update();
}
