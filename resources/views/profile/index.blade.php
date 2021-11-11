

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <title>Profile</title>
  </head>
  <style>
      body{
    /* background: -webkit-linear-gradient(left, #3931af, #00c6ff); */
    position:relative ;
    /* width: 100%; */
}
.navbar-profile{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}

.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 3%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.profile-edit-btn:hover{
    background-color: rgb(56, 56, 56);
    color: #ffffff;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}

.pointer {
    cursor: pointer;
}
.file:hover{
    background: #7cebffb8;
    color: black;

    /* cursor: pointer; */
    /* background-color: rgb(147, 197, 192); */
}


@media (max-width: 414px) {
 
    #card-profile{
        padding-top: 60px;
    }

    .profile-head {
        /* margin-top: ; */
        margin-left: 15%; /* IMPORTANT */
        margin-right: 15%; /* IMPORTANT */
        /* left: 50%; IMPORTANT */
        
        /* background: url(images/background.png) no-repeat center center; */
        /* width: 750px;
        height: 417px;

        margin-top: -208.5px; 
        margin-left: -375px; HALF OF THE WIDTH */
    }
    #myTabContent{   
    }
    .profile-edit-btn { position:fixed; bottom:5px; right:90px; }
    .profile-edit-btn { display:inline-block; }
    .profile-edit-btn:hover{
        background-color: rgb(56, 56, 56);
        color: #ffffff;
        cursor: pointer;
    }
    #profile-dropdown{
        margin-left: 15%; /* IMPORTANT */
        margin-right: 15%; /* IMPORTANT */
    }
  

    /* about */
    #nav-tab-home{
        margin-left: 15%;
        margin-right: 15%;
        width: 100%;
    }
    #nav-tab-home .row{
        width: 100%;
    }
    #nav-tab-home .row .col-md-5{
        width: 41%;
        /* margin-right: 1%; */
    }
    #nav-tab-home .row .col-md-6{
        margin-right: 11px;
        width: 51%; 
    }
    
    /* timeline */
    #nav-tab-profile{
        margin-left: 15%;
        margin-right: 15%;
        width: 100%;
    }
    #nav-tab-profile .row{
        width: 100%;
    }
    #nav-tab-profile .row .col-md-5{
        width: 40%;
        /* margin-right: 1%; */
    }
    #nav-tab-profile .row .col-md-6{
        width: 60%;
    }
    #nav-tab-profile .row .col-md-12 label{
        width: 50%;
        margin-left: 25%;
        margin-right: 25%;
    }
    #nav-tab-profile .row .col-md-12 p{
        width: 70%;
        text-align: center;
    }
    .profile-work {          
        width: 100%;
        
    }
    .pw-left .row{
     
        width: 50%;
        /* margin-right: 1%; */
    }
    .pw-right .row{
        width: 50%;
    }
}

@media (max-width: 320px) {
    
    #card-profile{
        padding-top: 50px;
    }
    .profile-head {
        /* margin-top: ; */
        margin-left: 15%; /* IMPORTANT */
        margin-right: 15%; /* IMPORTANT */
        /* left: 50%; IMPORTANT */
        
        /* background: url(images/background.png) no-repeat center center; */
        /* width: 750px;
        height: 417px;

        margin-top: -208.5px;7 
        margin-left: -375px; HALF OF THE WIDTH */
    }
    #myTabContent{
        

    }
    .profile-edit-btn { position:fixed; bottom:5px; right:65px; }
    .profile-edit-btn { display:inline-block; }
  
    
    .profile-edit-btn:hover{
        background-color: rgb(56, 56, 56);
        color: #ffffff;
        cursor: pointer;
    }
    #profile-dropdown{
        margin-left: 15%; /* IMPORTANT */
        margin-right: 15%; /* IMPORTANT */
    }
  

    /* about */
    #nav-tab-home{
        margin-left: 15%;
        margin-right: 15%;
        width: 100%;
    }
    #nav-tab-home .row{
        width: 100%;
    }
    #nav-tab-home .row .col-md-5{
        width: 41%;
        /* margin-right: 1%; */
    }
    #nav-tab-home .row .col-md-6{
        margin-right: 5px;
        width: 51%; 
    }
    

    /* timeline */
    #nav-tab-profile{
        margin-left: 15%;
        margin-right: 15%;
        width: 100%;
    }
    #nav-tab-profile .row{
        width: 100%;
    }
    #nav-tab-profile .row .col-md-5{
        width: 40%;
        /* margin-right: 1%; */
    }
    #nav-tab-profile .row .col-md-6{
        width: 60%;
    }
    #nav-tab-profile .row .col-md-12 label{
        width: 50%;
        margin-left: 25%;
        margin-right: 25%;
    }
    #nav-tab-profile .row .col-md-12 p{
        width: 70%;
        text-align: center;
    }












    .profile-work {
          
        width: 100%;
        
    }
    .pw-left .row{
     
        width: 50%;
        /* margin-right: 1%; */
    }
    .pw-right .row{
        width: 50%;
    }
    /* #content{
        margin-left: 15%;
        margin-right: 15%;
    } */
    }
    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
    }

  </style>
  <body>
  

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-5 pl-5 pr-5 " style="height: 60px;">
        <a class="navbar-brand" href="#">
            <img src="{{asset('assets/img/logo.svg')}}" width="75" height="50" class="d-inline-block align-top" alt="">
        </a>
        <a  style="margin-left: -20px;text-decoration: none;" class="text-white">Koperasi Serba Usaha</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

      
       
<div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto ">
        
          </ul>
                <ul class="nav navbar-nav navbar-right dropdown">
                    <li><a href="#" class="dropdown-toggle text-white px-5" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Erraldo Daniel S<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Setting</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
        </div>
      </nav>
     
      <div class="card-body " style="margin-top: -50px;" id="card-profile">
            <div class="container emp-profile"  id="content">
                <div class="card shadow  "  style="border-radius: 10px;" >
                        <form method="post"  class="mt-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-img">
                                        <img  style="border-radius: 10px;" id="dana" src="{{asset('assets/img/default.png')}}" alt=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="profile-head">
                                                <h5>
                                                    Erraldo Daniel S
                                                </h5>
                                                <h6>
                                                    Web Developer
                                                </h6>
                                                <p class="proile-rating">Joined Since : <span style="font-size: 10pt;color: #0F62CC;">November, 2020</span></p>
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <!-- //About -->
                                                    <li class="nav-item" role="presentation">
                                                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                                                    </li>
                                                    <!-- //Timeline -->
                                                    <li class="nav-item" role="presentation">
                                                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">History</a>
                                                    </li>
                                                </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 offset-4">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <!-- About -->
                                        <div class="tab-pane fade mb-5 show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                           <div  id="nav-tab-home">
                                               <div class="row">
                                                   <div class="col-md-5">
                                                       <label>RFID</label>
                                                   </div>
                                                   <div class="col-md-6">
                                                       <p>1929384029482</p>
                                                   </div>
                                               </div>
                                               <div class="row">
                                                   <div class="col-md-5">
                                                       <label>Name</label>
                                                   </div>
                                                   <div class="col-md-6">
                                                       <p>Erraldo Daniel S</p>
                                                   </div>
                                               </div>
                                               <div class="row">
                                                   <div class="col-md-5">
                                                       <label>Email</label>
                                                   </div>
                                                   <div class="col-md-6">
                                                       <p>erraldodaniels@gmail.com</p>
                                                   </div>
                                               </div>
                                               <div class="row">
                                                   <div class="col-md-5">
                                                       <label>Phone</label>
                                                   </div>
                                                   <div class="col-md-6">
                                                       <p>085890058280</p>
                                                   </div>
                                               </div>
                                               <div class="row">
                                                   <div class="col-md-5">
                                                       <label>Saldo StarPay</label>
                                                   </div>
                                                   <div class="col-md-6">
                                                       <p>Rp. 50.000</p>
                                                   </div>
                                               </div>
                                           </div>
                                          </div>
                                          <!-- //Timeline -->
                                           <div class="tab-pane fade mb-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                          <div  id="nav-tab-profile">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="dataTable" class="table table-bordered" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kode Transaksi</th>
                                                                <th>Jumlah Bayar</th>
                                                                <th>Kembalian</th>
                                                                <th>Tanggal</th>
                                                                <th>Option</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>TR0001</td>
                                                                <td>10000</td>
                                                                <td>2000</td>
                                                                <td>17-08-2021</td>
                                                               <td><a href="#" class="btn btn-primary btn-sm ml-2">View</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>TR0001</td>
                                                                <td>10000</td>
                                                                <td>2000</td>
                                                                <td>17-08-2021</td>
                                                                <td><a href="#" class="btn btn-primary btn-sm ml-2">View</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>TR0001</td>
                                                                <td>10000</td>
                                                                <td>2000</td>
                                                                <td>17-08-2021</td>
                                                                <td><a href="#" class="btn btn-primary btn-sm ml-2">View</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                          </div>
                                           </div>
                                      </div>
                               
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>

                   
        </div>
 
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  </body>
</html>
