{{-- resources/views/about.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Team</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* === Same CSS as your HTML file === */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        :root { --primary:#e2136e; --secondary:#d9fbfc; --accent:#6a1b9a; --dark:#1a1a2e; --light:#f8f9fa; --success:#4CAF50; }
        body { background:linear-gradient(135deg,#f5f7fa 0%,#e4edf5 100%); color:#333; line-height:1.6; min-height:100vh; padding:20px; }
        .container { max-width:1200px; margin:0 auto; text-align:center; }
        .brand { margin:10px 0 10px; transition:transform .3s ease; }
        .brand:hover { transform:scale(1.02); }
        .brand h1 { background:linear-gradient(to right,var(--primary),var(--accent)); color:var(--secondary); padding:20px; border-radius:12px; font-size:2.5rem; box-shadow:0 8px 20px rgba(226,19,110,.3); display:inline-block; position:relative; overflow:hidden; }
        .brand h1::after { content:""; position:absolute; top:0; left:-100%; width:100%; height:100%; background:linear-gradient(90deg,transparent,rgba(255,255,255,.4),transparent); transition:.5s; }
        .brand h1:hover::after { left:100%; }
        .brand a { text-decoration:none; color:inherit; }
        .tagline { font-size:1.2rem; margin:10px 0 30px; color:var(--accent); font-weight:500; }
        .team { display:flex; flex-wrap:wrap; justify-content:center; gap:30px; margin:40px 0; }
        .single-member { background:white; border-radius:16px; box-shadow:0 10px 30px rgba(0,0,0,.1); width:330px; padding:30px 20px; text-align:center; transition:all .3s ease; position:relative; overflow:hidden; }
        .single-member:hover { transform:translateY(-10px); box-shadow:0 15px 35px rgba(0,0,0,.15); }
        .single-member::before { content:""; position:absolute; top:0; left:0; width:100%; height:5px; background:linear-gradient(to right,var(--primary),var(--accent)); }
        .member-img { width:180px; height:180px; border-radius:50%; object-fit:cover; border:5px solid var(--secondary); box-shadow:0 5px 15px rgba(0,0,0,.1); margin:0 auto 20px; transition:transform .3s ease; }
        .single-member:hover .member-img { transform:scale(1.05); }
        .member-name { font-size:1.5rem; color:var(--dark); margin-bottom:8px; font-weight:700; }
        .member-title { font-size:1.1rem; color:var(--primary); margin-bottom:15px; font-weight:500; }
        .member-email { font-size:1rem; color:#555; margin-bottom:20px; word-break:break-all;width: 290px; }
        .social-links { display:flex; justify-content:center; gap:15px; margin-top:20px; }
        .social-links a { display:flex; align-items:center; justify-content:center; width:45px; height:45px; border-radius:50%; background:var(--primary); color:white; font-size:1.2rem; transition:all .3s ease; text-decoration:none; }
        .social-links a:hover { background:var(--accent); transform:translateY(-3px); }
        .footer { background:linear-gradient(to right,var(--primary),var(--accent)); color:var(--secondary); padding:25px; border-radius:12px; margin-top:50px; font-size:1.2rem; box-shadow:0 5px 15px rgba(0,0,0,.1); }
        .footer a { color:var(--secondary); text-decoration:none; font-weight:600; transition:all .3s ease; display:inline-block; padding:5px 10px; border-radius:6px; }
        .footer a:hover { background:rgba(255,255,255,.2); transform:translateY(-2px); }
        .logo { display:flex; justify-content:center; margin:20px 0; }
        .logo-circle { width:80px; height:80px; background:linear-gradient(135deg,var(--primary),var(--accent)); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 20px; box-shadow:0 5px 15px rgba(0,0,0,.2); }
        .logo-text { font-size:2.5rem; color:white; font-weight:700; }
        @media (max-width:768px){ .brand h1{font-size:2rem;padding:15px;} .team{gap:20px;} .single-member{width:100%;max-width:400px;} }
        @media (max-width:480px){ .brand h1{font-size:1.7rem;} .tagline{font-size:1rem;} }
    </style>
</head>

<body>
    <div class="container">
         
        <!-- Brand -->
        <div class="brand">
            <a href="{{ route('home') }}">
                <h1>SmartExam Platform</h1>
            </a>
        </div>
 
        <!-- Team Section -->
        <div class="team">
            <!-- Member 1 -->
            <div class="single-member">
                <img src="/images/rubelSir.jpeg"
                     alt="Rubel Sheikh" class="member-img">
                <h3 class="member-name">Rubel Sheikh</h3>
                <h5 class="member-title">Supervisor</h5>
                <p class="member-email">Educational Technology And Engineering <br> University of Frontier Technology,<br> Bangladesh Gazipur Kaliakair</p>
                <div class="social-links">
                    <a href="http://linkedin.com/in/Rony7s" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="http://facebook.com/Edtech.Engg" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://github.com/Rony7s" aria-label="GitHub"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>

        <div class="team">
            <!-- Member 2 -->
            <div class="single-member">
                <img src="https://avatars.githubusercontent.com/u/30334499?s=400&u=24b127b326ba9cbd721d018e267dc8f61600e680&v=4"
                     alt="Rony Ahmmed" class="member-img">
                <h3 class="member-name">Md. Rony Ahmmed Shah</h3>
                <h5 class="member-title">B.Sc Educational Technology And Engineering EdTE-UFTB</h5>
                <p class="member-email">bdu.rony@gmail.com</p>
                <div class="social-links">
                    <a href="http://linkedin.com/in/Rony7s" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="http://facebook.com/Edtech.Engg" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://github.com/Rony7s" aria-label="GitHub"><i class="fab fa-github"></i></a>
                </div>
            </div>

            <!-- Member 3 -->
            <div class="single-member">
                <img src="https://avatars.githubusercontent.com/u/162714714?v=4"
                     alt="Sajib Paul" class="member-img">
                <h3 class="member-name">Sajib Kumar Paul</h3>
                <h5 class="member-title">B.Sc Educational Technology And Engineering EdTE-UFTB</h5>
                <p class="member-email">2002009@icte.bdu.ac.bd</p>
                <div class="social-links">
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="http://facebook.com/Edtech.Engg" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <a href="https://www.facebook.com/EdTech4/">Thank you for visiting</a>
        </div>
    </div>
</body>
</html>
