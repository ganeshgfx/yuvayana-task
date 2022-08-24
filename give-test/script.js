function check(){

    let data = new FormData();

    const count = document.querySelector("#question_form").childElementCount-1;

    let optionSelected = [];

    for (qid of que_ids) {
        let element = document.querySelector(`#c${qid}:checked`);
        optionSelected.push(
            `{"q":"${element.id.replace("c","")}","a":"${parseInt(element.value)+1}"}`
        );
    }

    data.append("options",JSON.stringify(optionSelected));

    if(true){
        fetch('check.php', {
            method: "POST",
            enctype: "multipart/form-data",
            body: data,
        })
            .then((response) => {
                return response.text();
            })
            .then((data) => {
                console.log(data)
               document.getElementById("score").innerHTML =  "Your score is "+data;
            })
            .catch(function (err) {
                console.log("Failed", err);
            });
    }

}
