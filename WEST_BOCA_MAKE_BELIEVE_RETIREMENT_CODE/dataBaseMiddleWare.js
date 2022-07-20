function readForm(){
    nameFB = document.getElementById("name").value
    console.log(nameFB)

};

function addData(){
    readForm();

    firebase
    .database()
    .ref("Users")
    .set({
        name: nameFB,
    });
};