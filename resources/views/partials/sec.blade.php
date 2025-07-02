<nav id="nav"><button class="nav-icon" id="nav-icon"><span></span></button>
    <ul>
        <li><a href="/">home</a></li>
        <li><a href="/.#about">about</a></li>
        <li><a href="/.#course">Course</a></li>
        @auth
        <li><a href="/dashboard">Dashboard</a></li>
        <li>
          <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout').submit();">
              Logout
          </a>    
          <form id="logout" action="/logout" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
        @else
        <li><a href="/loginpage">Login</a></li>
        @endauth
    </ul>
  </nav>
  <style>
    * {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    border: 0;
    outline: 0;
    -webkit-font-smoothing: antialiased; 
  }
  nav a{
    color: white;
  }
  nav {
    mix-blend-mode: difference;
    z-index: 100;
    color: white; 
  }
  nav ul {
    position: fixed;
    top: 60px;
    right: 45px;
    height: 100vh;
    visibility: hidden;
    pointer-events: none;
    list-style: none;
    width: 35px; }
  nav ul li {
    text-transform: uppercase;
    letter-spacing: 2px;
    padding: 0.75em 0;
    writing-mode: vertical-lr;
    color: white;
  }
  nav.active ul {
    visibility: visible;
    pointer-events: initial;
    transition-delay: 0.2s; }
  
  .nav-icon {
    appearance: none;
    background: transparent;
    cursor: pointer;
    display: inline-block;
    height: 35px;
    position: fixed;
    top: 15px;
    right: 15px;
    transition: background 0.3s;
    width: 35px; }
  .nav-icon span {
    position: absolute;
    top: 15px;
    left: 5px;
    background: #fff;
    display: block;
    height: 3px;
    right: 5px;
    transition: transform 0.3s; }
  .nav-icon span:before, .nav-icon span:after {
    width: 100%;
    height: 3px;
        background: #fff;
        content: '';
        display: block;
        left: 0;
        position: absolute; }
      .nav-icon span:before {
        top: -8px; }
      .nav-icon span:after {
        bottom: -8px; }
    .active .nav-icon span {
      transform: rotate(90deg); }
  </style>
  <script>
    var nav = document.getElementById('nav');
  var navlinks = nav.getElementsByTagName('a');
  
  function toggleNav() {
      (nav.classList.contains('active')) ? nav.classList.remove('active') : nav.classList.add('active');
    }
  
  document.getElementById('nav-icon').addEventListener('click', function(e) {
      e.preventDefault();
      toggleNav();
  });
  
  for(var i = 0; i < navlinks.length; i++) {
      navlinks[i].addEventListener('click', function() {
        toggleNav();
    });
  }
  </script>