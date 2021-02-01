


// xhr 
export function getData(fun,src){
    // new xhr object
    let xhr = new XMLHttpRequest(); 
    // open req
    xhr.open('GET','config/'+src,true);
    let list;
    xhr.onload = function(){
        // check status
        if(xhr.status === 200){
        // get data (JSON format)
        list = JSON.parse(this.response);
        console.log(list);
        fun(list); // Display data
        }
    }      

    xhr.send();
}
