const checkbox = document.getElementById("checkbox")
const text = document.getElementsByClassName("infoh1")[0]


function ischecked(){
    if (checkbox.checked == true){
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
}