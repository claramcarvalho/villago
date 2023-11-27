<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="public\css\normalize.css">
    <link rel="stylesheet" href="public\css\index.css">
    <link rel="icon" href="images\icon\villago_w.ico" />
    
    <title>Villago - It takes a village!</title>
    <script src="https://kit.fontawesome.com/17ea45e253.js" crossorigin="anonymous"></script>
  </head>

  <body>
    
    <header class="header">
      <img src="images\logo\logo_black_no_slogan.png" alt="Logo Site Villago, white sans serif font, red o with a white roof on top of the o. On top of the chimney on the roof stands a red heart." max-height="80px"/>
      <!-- Condition to display the correct button in case user is logged in or not. Logic on login.php file -->
      <button onclick="openMenu()">Login / SignUp</button>
    </header>

    <div class = "filterBar">
        <div class = "bigSearchBar">
          <button type="submit" id="filter-country" class = "seachBarIcon">Country</button>
          <button type="submit" id="filter-lang" class = "seachBarIcon">Language</button>
          <button type="submit" id="filter-serv" class = "seachBarIcon">Services</button>
          <input type="text" id="query" name="query" placeholder="Search for...">
        </div>
    </div>
    <section id="section_all_services">
      <section id="section_services_list">
      </section>
      <section id="section_services_map">
        <div id="mapGoogle"></div>    
        <script>
          (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
            //key: "AIzaSyCfOFNxXGnb4od4rF9a3c4eKmECqbblPF8",
            v: "weekly",
            // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
            // Add other bootstrap parameters as needed, using camel case.
          });
        </script>
      </section>
    </section>
    <footer>
      <p>Copyright &copy; 2023 Villago</a></p>
    </footer>
  </body>
  <script src="public\js\index.js"></script>
  <script type="module" src="public\js\loadMap.js"></script>
</html>

