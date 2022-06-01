let data ={
    customType:'',
    labels:[],
    datasets:[{
        label:'Chargement',
        data:[]
    }]
}

const config = {
    type: 'bar',
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chargement'
            }
        }
    },
};


let ctx=document.getElementById('graph1');
let graph1 =new Chart(ctx,config);
ctx.onclick=clickHanlder;
updatedata(config,graph1,'Organisation','');
let previousButton=document.getElementById('previous');
previousButton.onclick= clickHanlderPrevious;

