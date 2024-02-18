var months = ["January", "February", "March", "April", "May", "June", "July",
    "August", "September", "October", "November", "December"];
var days = ['Sun ', 'Mon ', 'Tue ', 'Wed ', 'Thu ', 'Fri ', 'Sat ']

var calendarobject = document.getElementById('calendar')
var currentMonth = (new Date()).getMonth()
var currentYear = (new Date()).getFullYear()
var year = currentYear
var month = currentMonth
var y1
var mon
var date = (new Date()).getDate()
function loadcalendar(year, month) {
    y1 = year
    mon = month
    document.getElementById("current-date").innerHTML = months[month] + ' ' + year
    var FirstDay = (new Date(year, month, 01)).getDay()
    var numberofDays = 32 - (new Date(year, month, 32).getDate())
    //return FirstDay
    let table = document.createElement('table')
    table.setAttribute('class', "table")
    table.setAttribute('id', "table")
    let thead = document.createElement('thead')
    let theadrow = document.createElement('tr')
    for (wd = 0; wd <= 6; wd++) {
        let th = document.createElement('th')
        let thtext = document.createTextNode((days[wd]))
        th.append(thtext)
        theadrow.append(th)
    }
    thead.append(theadrow)
    table.append(thead)
    let tbody = document.createElement('tbody')
    var datedate = 1

    for (wk = 0; wk < 6; wk++) {
        let tr = document.createElement('tr')
        for (wds = 0; wds <= 6; wds++) {
            var td = document.createElement('td')
            td.setAttribute('class', 'query')
            if (datedate > numberofDays) {
                continue
            }
            if ((wk == 0) && ((wds < FirstDay))) {
            }
            else {
                if ((datedate == date) && (month == currentMonth) && (year == currentYear)) {
                    let tdtext = document.createTextNode(datedate)
                    var div = document.createElement('div')
                    var button = document.createElement('button')


                    div.setAttribute('class', 'content')
                    button.setAttribute('class', "curr_button")
                    
                    button.append(tdtext)
                    var list = document.createElement('div')
                    list.setAttribute('class', 'options')
                    list.setAttribute('id', 'options')
                    let b1 = document.createElement('button')
                    b1.setAttribute('class', "b")
                    let b2 = document.createElement('button')
                    b2.setAttribute('class', "b")
                    let o1text = document.createTextNode('New Reservation')
                    let o2text = document.createTextNode('Edit Reservation')
                    b1.append(o1text)
                    b2.append(o2text)
                    list.append(b1)
                    list.append(b2)
                    div.append(button)
                    div.append(list)
                    td.append(div)
                    datedate = datedate + 1
                }
                else {
                    let tdtext = document.createTextNode(datedate)
                    var div = document.createElement('div')
                    var button = document.createElement('button')
                    var div = document.createElement('div')

                    div.setAttribute('class', 'content_1')
                    button.setAttribute('class', "button")
                    //button.setAttribute('onclick', 'display1();')
                    //button.setAttribute('onclick','myfunction()')
                    button.setAttribute("id", 'b' + datedate)
                    button.append(tdtext)
                    var list = document.createElement('div')
                    list.setAttribute('class', 'options_1')
                    let b1 = document.createElement('button')
                    b1.setAttribute('class', "b_1")
                    let b2 = document.createElement('button')
                    b2.setAttribute('class', "b_1")
                    let o1text = document.createTextNode('New Reservation')
                    let o2text = document.createTextNode('Edit Reservation')
                    b1.append(o1text)
                    b2.append(o2text)
                    list.append(b1)
                    list.append(b2)
                    button.append(list)
                    div.append(button)
                    
                    td.append(div)
                    datedate = datedate + 1

                }
            }
            tr.append(td)
        }
        tbody.append(tr)
    }
    table.append(tbody)
    calendarobject.append(table)
}

loadcalendar(year, month)
allocation()
function clearBox(elementID) {
    var div = document.getElementById(elementID);
    while (div.firstChild) {
        div.removeChild(div.firstChild);
    }
}
function prev() {
    if (month == 0) {
        clearBox('calendar')
        year = year - 1
        month = 11
        loadcalendar(year, 11)
        allocation()
    }
    else {
        clearBox('calendar')
        month = month - 1
        loadcalendar(year, month)
        allocation()
    }
}
function next() {
    if (month == 11) {
        clearBox('calendar')
        year = year + 1
        month = 0
        loadcalendar(year, 0)
        allocation()
    }
    else {
        clearBox('calendar')
        month = month + 1
        loadcalendar(year, month)
        allocation()
    }
}

function allocation(){
var classname = document.getElementsByClassName('button')
for (var i = 0; i < classname.length; i++) {
    classname[i].addEventListener('click', (event) => myfunction(event));
    classname[i].addEventListener('click', (event) => display1(event))
}
var a = document.getElementsByClassName('curr_button')
for (var i = 0; i < a.length; i++) {
    a[i].addEventListener('click', (event) => myfunction(event));
    a[i].addEventListener('click',(event)=>display(event))
    

}
var opt = document.getElementsByClassName('options')
for (var i = 0; i < opt.length; i++) {
    opt[i].addEventListener('mouseleave', (event) => hide(event));
}
var opt = document.getElementsByClassName('options_1')
for (var i = 0; i < opt.length; i++) {
    opt[i].addEventListener('mouseleave', (event) => hide_1(event));
}



var opt = document.getElementsByClassName('options_1')
for (var i = 0; i < opt.length; i++) {
    opt[i].addEventListener('mouseleave', (event) => hide_1(event));
}
}

function myfunction(event) {
    var target = event.target || event.srcElement;
    //document.getElementById("current-date").innerHTML=target.innerHTML+' '+months[mon] + ' '+ y1
    document.getElementById("d").innerHTML = target.innerHTML + ' ' + months[mon] + ' ' + y1


}

function display() {
    var a1 = document.getElementsByClassName("options")
    for (var i = 0; i < a1.length; i++) {
        a1[i].style.display = 'block'
    }
}


function display1(event) {
    event.target.firstElementChild.style.display='block'
       // if
        //a1[i].style.display = 'block'
    }


/*var q = document.getElementsByClassName('options')
    for (var i = 0; i < q.length; i++) {
        q[i].addEventListener('click',  (event)=>handleClickOutsideBox(event) )}


function handleClickOutsideBox(event){   
    var q1 = document.getElementsByClassName('options')
    //var target = event.target || event.srcElement;   
    for (i=0;i<q1.length;i++){  
    if (!q1.contains(event.target.closest(".options")) ){
    q1[i].style.display = 'block'}     
    else{
        q1[i].style.display = 'none'}  
    }  
}
*/


function hide(){
    var a1 = document.getElementsByClassName("options")
    for (var i = 0; i < a1.length; i++) {
        a1[i].style.display = 'none'
    }
}


function hide_1(){
    var a1 = document.getElementsByClassName("options_1")
    for (var i = 0; i < a1.length; i++) {
        a1[i].style.display = 'none'
    }
}
