function showBlocc(id) {
    var x = document.getElementById("homeDiv");
    var y = document.getElementById("registerDiv");
    var z = document.getElementById("registrationDiv");
      
    x.style.display = "none";
    y.style.display = "none";
    z.style.display = "none";

    document.getElementById(id).style.display = "block";
}

function valid()
{
    name = document.getElementById("name").value,
    eid = document.getElementById("eid").value,
    male = document.getElementById("male").value,
    female = document.getElementById("female").value,
    other= document.getElementById("other").value,
    cno = document.getElementById("cno").value,
    iid = document.getElementById("iid").value,
    category = document.getElementById("category"),
    memeLink = document.getElementById("memeLink").value;

    var atposition  = eid.indexOf("@");  
    var dotposition = eid.lastIndexOf("."); 

    if (name === "") {
        return("Name cannot be empty");
    } else if (name.length<3) {
        alert("Name too small");
    } else if (name.length>30) {
        return("Name too big");
    } else if (isNaN(name)==false){
        return("Name cannot be numeric");
    } else if (eid === "") {
        return("Email id cannot be empty");
    } else if (atposition<1 || dotposition<atposition+2 || dotposition+2>=eid.length) {
        return("Invalid Email id");
    } else if (cno === "") {
        return("Contact No. cannot be empty");
    } else if (isNaN(cno)==true) {
        return("Enter a Valid Phone Number (Only digits) ");
    } else if (cno.length !=10 ) {
        return("Enter a Valid Phone Number (10 digit only)");
    } else if (memeLink === "xxx") {
        return("Password too weak, add special char and digits");
    } else if  (!(document.getElementById('male').checked) && !(document.getElementById('female').checked) && !(document.getElementById('other').checked)) {
        return("Select a Gender .")
    }

  return true;
}

function addRegistration()
{
   if(valid() == true) {
        alert("Form will be submitted");

        var table = document.getElementById("table");
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();   //calculate current date and time
        var dateTime = date+' '+time;
        
        var newRow = table.insertRow(table.length),
        cell1 = newRow.insertCell(0),
        cell2 = newRow.insertCell(1),
        cell3 = newRow.insertCell(2),
        cell4 = newRow.insertCell(3),
        cell5 = newRow.insertCell(4),
        cell6 = newRow.insertCell(5),
        cell7 = newRow.insertCell(6),
        cell8 = newRow.insertCell(7);

        name = document.getElementById("name").value,
        eid = document.getElementById("eid").value,
        male = document.getElementById("male").value,
        female = document.getElementById("female").value,
        other= document.getElementById("other").value,
        cno = document.getElementById("cno").value,
        iid = document.getElementById("iid").value,
        memeLink = document.getElementById("memeLink").value;

        var e = document.getElementById("category");
        var cat = e.options[e.selectedIndex].text;

        if (document.getElementById('male').checked) {
            g = document.getElementById('male').value;
        }
        else if (document.getElementById('female').checked) {
            g = document.getElementById('female').value;
        }
        else if (document.getElementById('other').checked) {
            g = document.getElementById('other').value;
        }

        cell1.innerHTML = dateTime;
        cell2.innerHTML = name;
        cell3.innerHTML = eid;
        cell4.innerHTML = g;
        cell5.innerHTML = cno;
        cell6.innerHTML = iid;
        cell7.innerHTML = cat;
        cell8.innerHTML = memeLink;

        document.getElementById("reg").reset();
        selectedRowToInput();
        document.getElementById("reg").reset();
   }
   else {
       alert(valid());
   }
}
