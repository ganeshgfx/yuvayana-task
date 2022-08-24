function save(){


    const question = document.getElementById('question').value.trim();
    const option1 = document.getElementById('option1').value.trim();
    const option2 = document.getElementById('option2').value.trim();
    const option3 = document.getElementById('option3').value.trim();
    const option4 = document.getElementById('option4').value.trim();


    const ans1 = document.getElementById('ans1');
    const ans2 = document.getElementById('ans2');
    const ans3 = document.getElementById('ans3');
    const ans4 = document.getElementById('ans4');

    let ans = 1;

    if(ans1.checked) ans = 1;
    if(ans2.checked) ans = 2;
    if(ans3.checked) ans = 3;
    if(ans4.checked) ans = 4;

    let valid = true;


    if(question===""){
       alert("Please input question");
        valid = false;
    }
    if(option1===""||option2===""||option3===""||option4===""){
        alert("Please input all options");
        valid = false;
    }

    let options = [];

    options.push(option1)
    options.push(option2)
    options.push(option3)
    options.push(option4)

    if(valid){

        let data = new FormData();
        data.append("question",question );
        data.append("options",JSON.stringify(options) );
        data.append("answer",ans );

        fetch('save.php', {
            method: "POST",
            enctype: "multipart/form-data",
            body: data,
        })
            .then((response) => {
                return response.text();
            })
            .then((data) => {
               alert(
                   data
                );
            })
            .catch(function (err) {
                console.log("Failed", err);
            });
    }

}
