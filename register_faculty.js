const buttons = document.getElementsByTagName("button");
function myFunction() {
    if (confirm("Confirm the chosen time slot?")) {
        return true;
     } else {
       window.location.reload()
     }
    }


for (let button of buttons) {
  button.addEventListener("click", (event)=>ins(event));
}

function ins(event){
    var target = event.target || event.srcElement;
    if (target.className == "invalid"){

    }
    // var date = '<?php echo $date;?>'
    // var conf_room='<?php echo $conf_room;?>'
    // var user_name='B21312'
    // var js_var = '<?php echo $time_slot_var ;?>';
    else{
    var a=target.id
    const date = document.getElementById('date').textContent
    const conf_room = document.getElementById('conf_room').textContent
    const username = document.getElementById('username').textContent
    const designation = document.getElementById('designation').textContent
    
    location.href = "register_faculty.php?p1="+a+"&p2="+date+"&p3="+conf_room+"&username="+username+"&designation="+designation;
    location.href="thankyou.html"
    }
}