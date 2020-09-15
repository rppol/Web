<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <meta charset="utf-8">
        <title>Data Classes in PHP Assignment</title>
        <!-- CSS only -->
        <style>  
          .container{
            align-items: center;
            justify-content: center; 
            padding: 40px 40px;
          }
          #tabl{
            display:none;
          }
          .tab{
            margin-top: 30px;
            padding-left: 40px;
          }
          .cont{
            padding-top: 30px;
            text-align: center;
      }                 
       </style>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
       <link rel = "stylesheet" href = "css.css">  
    </head>
    
    <body>
    <nav class="navbar navbar-light justify-content-center" style="background-color: #e3f2fd;">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="45" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        Web Technology Assignment 4 
      </a>
    </nav>

    <div class="cont">
      <h1>Please Select ID from drop down list to view details of your supper</h1>
      <h2>Bon Appetit!</h2>
    </div>
      <div class="container">
      <select name="item restaurant-dropdown restaurant" class="custom-select custom-select-lg mb-3" id="restaurant">
        <option value="">Select Dish (Click to select)</option>
    </select>
    <br>
  
    <table id="tabl" class="table thead-dark table-striped table-hover table-borderless">
      
      <tr>
        <th class = "table-primary">ID</th>
        <td id="id"></td>
      </tr>
      <tr>
        <th>Name</th>
        <td id="menuname"></td>
      </tr>
      <tr>
        <th>Short Name</th>
        <td id="sname"></td>
      </tr>
      <tr>
        <th>Description</th>
        <td id="descp"></td>
      </tr>
      <tr>
        <th>Price Small</th>
        <td id="psmall"></td>
      </tr>
      <tr>
        <th>Price Large</th>
        <td id="plarge"></td>
      </tr>
    </table>

    </div>
        
    <footer class="page-footer font-small stylish-color-dark bg-dark pt-4" style="position:fixed; bottom:0;width: 100%;">
      <div class="footer-copyright text-center py-3" style="background: #A9A9A9">Rutik Pol, 0120180213
      </div>
    </footer>
            
        <script src="jquery-3.5.1.min.js"></script>
        <script>
        let base_url = "http://localhost/datafetch.php";

        $("document").ready(function(){
            getRestaurantMenuList();
            document.querySelector("#restaurant").addEventListener("change",getMenuItemList);
        });

        function getRestaurantMenuList() {
            let url = base_url + "?req=menu_name_list";
            $.get(url,function(data,success){
                for (const key in data) {
                let opt = document.createElement("option");
                opt.textContent = data[key].id;
                opt.value = data[key].id;
                document.querySelector('#restaurant').appendChild(opt);
            }
            });
        }
            function getMenuItemList(e)
            {
                
                let id=e.target.value;
                console.log(id);
                let url=base_url + "?req=menuName&id="+id;
                $.get(url,function(data,success){
                        if(data != null){
                        console.log(data);
                        let x = data;

                        let pricesmall = x.price_small;
                        
                        if(pricesmall == null){
                            pricesmall = "Not available";
                        }
                        let descrp = x.description;
                        if(descrp == ""){
                            descrp = "Description not available";
                        }
                        
                        document.querySelector("#menuname").textContent = x.name;
                        document.querySelector("#id").textContent = x.id;
                        document.querySelector("#sname").textContent = x.short_name;
                        document.querySelector("#descp").textContent = descrp;
                        document.querySelector("#psmall").textContent = pricesmall;
                        document.querySelector("#plarge").textContent = x.price_large;
                    }
                    document.getElementById("tabl").style.display = "block";
                });
                
            }
    </script>
    </body>
</html>
