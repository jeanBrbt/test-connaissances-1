function clickHanlder(click){
    const points =graph1.getElementsAtEventForMode(click,'nearest',{intersect:true},true);
    if(points.length){
        const p= points[0];
        switch (config.data.customType){
            case "Organisation":
                updatedata(config,graph1,"Building",config.data.labels[p.index]);
                break;
            case  "Building":
                updatedata(config,graph1,"Piece",config.data.labels[p.index]);
                break;
            case  "Piece":
                console.log("j'ai rien a faire");
                break;
            default:
                break;
        }
    }
}
function clickHanlderPrevious(click){
    updatedata(config,graph1,'Organisation','');
}
