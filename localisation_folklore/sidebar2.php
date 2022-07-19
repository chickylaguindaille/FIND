
      <!-- SIDEBAR -->
      <div id="sideBar" class="sideBar">
            <div href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img class="closebtnImg" src="../Logos/closebtn.png"></div><br><br><br>

            <button class="FIND" onclick="myFunctionSideBar()"><img src="../Logos/find.png"><a>FIND</a></button>
            
            <div id="deroulant">
            <button class="localisation-btn" id="localisation-btn" onclick="myFunctionSideBar2()"><img src="../Logos/localisation.png"><a>Localisation</a></button>
              <div class="localisation-container" id="localisation-container">
                <button class="france" id="btnFrance" onclick="self.location.href='ville.php?id=France'"><img src="../Logos/France.png"><a>France</a></button>
                <button class="belgique" id="btnBelgique" onclick="self.location.href='ville.php?id=Belgique'"><img src="../Logos/Belgique.png"><a>Belgique</a></button>
              </div>
              

              <button class="folklore-btn" id="folklore-btn" onclick="myFunctionSideBar3()"><img src="../Logos/folklore.png"><a>Folklore</a></button>
              <div class="folklore-container" id="folklore-container">
                <button class="faluche" id="btnFaluche" onclick="self.location.href='couvre_chef.php?id=Faluche'"><img src="../Logos/Faluche.png"><a>Faluche</a></button>
                <button class="calotte" id="btnCalotte" onclick="self.location.href='couvre_chef.php?id=Calotte'"><img src="../Logos/Calotte.png"><a>Calotte</a></button>
                <button class="penne" id="btnPenne" onclick="self.location.href='couvre_chef.php?id=Penne'"><img src="../Logos/Penne.png"><a>Penne</a></button>
              </div>
            </div>

            <div class="separateur" id="s1"></div>

              <button class="calendrier-btn" id="calendrier-btn" onclick="myFunctionSideBar4()"><img src="../Logos/calendrier.png"><a>Calendrier</a></button>
              <div class="calendrier-container" id="calendrier-container">
                <button class="congres" id="btnCongres" onclick="self.location.href='../calendrier/congres.php?id=Congrès'"><img src="../Logos/France.png"><a>Congrès</a></button>
                <button class="ordinesque" id="btnOrdre" onclick="self.location.href='../calendrier/ordinesque.php?id=Ordinesque'"><img src="../Logos/Belgique.png"><a>Ordinesque</a></button>
              </div>

              <div class="separateur" id="s2"></div>

              <button class="insignes-btn" id="insignes-btn" onclick="myFunctionSideBar5()"><img src="../Logos/insignes.png"><a>Insignes</a></button>
              <div class="insignes-container" id="insignes-container">
                <button class="congres" id="btnCongres" onclick="self.location.href='../insignes/france.php?id=France'"><img src="../Logos/France.png"><a>Code National Faluche</a></button>
                <button class="ordinesque" id="btnOrdre" onclick="self.location.href='../insignes/belgique.php?id=Belgique'"><img src="../Logos/Belgique.png"><a>Usage en Belgique</a></button>
              </div>

              <div class="separateur" id="s3"></div>

              <button class="codes-btn" id="codes-btn" onclick="myFunctionSideBar6()"><img src="../Logos/codes.png"><a>Codes</a></button>
              <div class="codes-container" id="codes-container">
                <button class="congres" id="btnCongres" onclick="self.location.href='../codes/ville_codes.php?id=France'"><img src="../Logos/France.png"><a>Français</a></button>
                <button class="ordinesque" id="btnOrdre" onclick="self.location.href='../codes/ville_codes.php?id=Belgique'"><img src="../Logos/Belgique.png"><a>Belge</a></button>
              </div>

              <div class="separateur" id="s4"></div>

              <button class="revisions-btn" id="revisions-btn" onclick="myFunctionSideBar7()"><img src="../Logos/revisions.png"><a>Révisions</a></button>
              <div class="revisions-container" id="revisions-container">
                <button class="congres" id="btnCongres" onclick="self.location.href='#'"><img src="../Logos/France.png"><a>Révision code</a></button>
                <button class="ordinesque" id="btnOrdre" onclick="self.location.href='#'"><img src="../Logos/Belgique.png"><a>Lecture de Calotte</a></button>
              </div>

              <button class="pwa"><img src="../Logos/pwa.png"><a>Ajouter à l'accueil</a></button>
              <button class="soumettre"><img src="../Logos/soumettre.png"><a>Soumettre Folklore</a></button>

              <img class="photoFindSideBar" src="../Logos/Logo512-nobackground.png">
        </div>

        <script>

function myFunctionSideBar() {
            var x = document.getElementById("deroulant");
            var y = document.getElementById("localisation-container");
            var z = document.getElementById("folklore-container");
            var c = document.getElementById("calendrier-container");
            var i = document.getElementById("insignes-container");
            var co = document.getElementById("codes-container");
            var r = document.getElementById("revisions-container");

            if (x.style.display === "block") {
                x.style.display = "none";
                s1.style.display ="block";
                // x.reset();
            } else {
                x.style.display = "block";
                c.style.display ="none";
                i.style.display ="none";
                co.style.display ="none";
                r.style.display ="none";
                s1.style.display ="none";
                s2.style.display ="block";
                s3.style.display ="block";
                s4.style.display ="block";
            }


        }

function myFunctionSideBar2() {
        var x = document.getElementById("deroulant");
        var y = document.getElementById("localisation-container");
        var z = document.getElementById("folklore-container");
        var c = document.getElementById("calendrier-container");
        var i = document.getElementById("insignes-container");
        var co = document.getElementById("codes-container");
        var r = document.getElementById("revisions-container");

        if (y.style.display === "block") {
                y.style.display = "none";
                document.getElementById("deroulant").style.height="16%";
                document.getElementById("localisation-btn").style.height="50%";
                document.getElementById("folklore-btn").style.height="50%";

                // y.reset();
                
                
            } else {
                y.style.display = "block";
                document.getElementById("deroulant").style.height="32%";
                document.getElementById("localisation-btn").style.height="25%";
                document.getElementById("btnFrance").style.height="50%";
                document.getElementById("btnBelgique").style.height="50%";
                document.getElementById("folklore-btn").style.height="25%";
                y.style.height="50%";
                if (z.style.display === "block") {
                  z.style.display = "none";
                }
            }
          }

function myFunctionSideBar3() {
        var x = document.getElementById("deroulant");
        var y = document.getElementById("localisation-container");
        var z = document.getElementById("folklore-container");
        var c = document.getElementById("calendrier-container");
        var i = document.getElementById("insignes-container");
        var co = document.getElementById("codes-container");
        var r = document.getElementById("revisions-container");

        if (z.style.display === "block") {
                z.style.display = "none";
                document.getElementById("deroulant").style.height="16%";
                document.getElementById("localisation-btn").style.height="50%";
                document.getElementById("folklore-btn").style.height="50%";
                // z.reset();
                
                
            } else {
                z.style.display = "block";
                document.getElementById("deroulant").style.height="40%";
                document.getElementById("localisation-btn").style.height="20%";
                document.getElementById("btnFaluche").style.height="33.33%";
                document.getElementById("btnCalotte").style.height="33.33%";
                document.getElementById("btnPenne").style.height="33.33%";
                document.getElementById("folklore-btn").style.height="20%";
                z.style.height="60%";
                if (y.style.display === "block") {
                  y.style.display = "none";
                }
            }
          }

function myFunctionSideBar4() {
        var x = document.getElementById("deroulant");
        var y = document.getElementById("localisation-container");
        var z = document.getElementById("folklore-container");
        var c = document.getElementById("calendrier-container");
        var i = document.getElementById("insignes-container");
        var co = document.getElementById("codes-container");
        var r = document.getElementById("revisions-container");

        if (c.style.display === "block") {
                c.style.display = "none";
                c.style.height="16%";
                s2.style.display ="block";
                // y.reset();     
            } else {
                c.style.display = "block";
                c.style.height="16%";
                x.style.display = "none";
                i.style.display ="none";
                co.style.display ="none";
                r.style.display ="none";

                s1.style.display ="block";
                s2.style.display ="none";
                s3.style.display ="block";
                s4.style.display ="block";
            }
          }

function myFunctionSideBar5() {
        var x = document.getElementById("deroulant");
        var y = document.getElementById("localisation-container");
        var z = document.getElementById("folklore-container");
        var c = document.getElementById("calendrier-container");
        var i = document.getElementById("insignes-container");
        var co = document.getElementById("codes-container");
        var r = document.getElementById("revisions-container");

        if (i.style.display === "block") {
                i.style.display = "none";
                i.style.height="16%";
                s3.style.display ="block";
                // y.reset();     
            } else {
                i.style.display = "block";
                i.style.height="16%";
                x.style.display = "none";
                c.style.display ="none";
                co.style.display ="none";
                r.style.display ="none";

                s1.style.display ="block";
                s2.style.display ="block";
                s3.style.display ="none";
                s4.style.display ="block";
            }
          }

function myFunctionSideBar6() {
        var x = document.getElementById("deroulant");
        var y = document.getElementById("localisation-container");
        var z = document.getElementById("folklore-container");
        var c = document.getElementById("calendrier-container");
        var i = document.getElementById("insignes-container");
        var co = document.getElementById("codes-container");
        var r = document.getElementById("revisions-container");

        if (co.style.display === "block") {
                co.style.display = "none";
                co.style.height="16%";
                s4.style.display ="block";
                // y.reset();     
            } else {
                co.style.display = "block";
                co.style.height="16%";
                x.style.display = "none";
                c.style.display ="none";
                i.style.display ="none";
                r.style.display ="none";

                s1.style.display ="block";
                s2.style.display ="block";
                s3.style.display ="block";
                s4.style.display ="none";
            }
          }

function myFunctionSideBar7() {
        var x = document.getElementById("deroulant");
        var y = document.getElementById("localisation-container");
        var z = document.getElementById("folklore-container");
        var c = document.getElementById("calendrier-container");
        var i = document.getElementById("insignes-container");
        var co = document.getElementById("codes-container");
        var r = document.getElementById("revisions-container");

        if (r.style.display === "block") {
                r.style.display = "none";
                r.style.height="16%";
                // y.reset();     
            } else {
                r.style.display = "block";
                r.style.height="16%";
                x.style.display = "none";
                c.style.display ="none";
                i.style.display ="none";
                co.style.display ="none";
            }
          }






        function openNav() {
          document.getElementById("sideBar").style.width = "250px";
        }
        
        function closeNav() {
          document.getElementById("sideBar").style.width = "0";
        }

        function myFunction() {
            var x = document.getElementById("searchForm");
            var y = document.getElementById("headerBase")
            if (x.style.display === "flex") {
                x.style.display = "none";
                y.style.display = "flex";
                x.reset();
                
            } else {
                x.style.display = "flex";
                y.style.display = "none";
            }
        }

        var dropdown = document.getElementsByClassName("localisation-btn");



var dropdownFol = document.getElementsByClassName("folklore-btn");


    </script>