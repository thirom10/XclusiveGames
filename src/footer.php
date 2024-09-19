<style>
    
/* footer */
footer{
  margin-left: 200px;
  background: #1e1d1f;
  bottom: 0;
  left: 0;
}
footer .content{
  max-width: 1250px;
  margin: auto;
  padding: 30px 40px 40px 40px;
}
footer .content .top{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 50px;
}
.content .top .logo-details{
  color: #fff;
  font-size: 30px;
}
.content .top .media-icons{
  display: flex;
}
.content .top .media-icons a{
  height: 40px;
  width: 40px;
  margin: 0 8px;
  border-radius: 50%;
  text-align: center;
  line-height: 40px;
  color: #fff;
  font-size: 17px;
  text-decoration: none;
  transition: 0.2s ease;
}
.top .media-icons a:nth-child(1){
  background: #4267B2;
}
.top .media-icons a:nth-child(1):hover{
  color: #4267B2;
  background: #fff;
}
.top .media-icons a:nth-child(2){
  background: #1DA1F2;
}
.top .media-icons a:nth-child(2):hover{
  color: #1DA1F2;
  background: #fff;
}
.top .media-icons a:nth-child(3){
  background: #E1306C;
}
.top .media-icons a:nth-child(3):hover{
  color: #E1306C;
  background: #fff;
}
.top .media-icons a:nth-child(4){
  background: #0077B5;
}
.top .media-icons a:nth-child(4):hover{
  color: #0077B5;
  background: #fff;
}
.top .media-icons a:nth-child(5){
  background: #FF0000;
}
.top .media-icons a:nth-child(5):hover{
  color: #FF0000;
  background: #fff;
}
footer .content .link-boxes{
  width: 100%;
  display: flex;
  justify-content: space-between;
}
footer .content .link-boxes .box{
  width: calc(100% / 5 - 10px);
}
.content .link-boxes .box .link_name{
  color: #fff;
  font-size: 18px;
  font-weight: 400;
  margin-bottom: 10px;
  position: relative;
}
.link-boxes .box .link_name::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: -2px;
  height: 2px;
  width: 35px;
  background: #fff;
}
.content .link-boxes .box li{
  margin: 6px 0;
  list-style: none;
}
.content .link-boxes .box li a{
  color: #fff;
  font-size: 14px;
  font-weight: 400;
  text-decoration: none;
  opacity: 0.8;
  transition: 0.4s ease
}
.content .link-boxes .box li a:hover{
  opacity: 1;
  text-decoration: underline;
}
.content .link-boxes .input-box{
  margin-right: 55px;
}
.link-boxes .input-box input{
  height: 40px;
  width: calc(100% + 55px);
  outline: none;
  border: 2px solid #AFAFB6;
  background: #1e1d1f;
  border-radius: 4px;
  padding: 0 15px;
  font-size: 15px;
  color: #fff;
  margin-top: 5px;
}
.link-boxes .input-box input::placeholder{
  color: #AFAFB6;
  font-size: 16px;
}
.link-boxes .input-box input[type="button"]{
  background: #fff;
  color: #000;
  border: none;
  font-size: 18px;
  font-weight: 500;
  margin: 4px 0;
  opacity: 0.8;
  cursor: pointer;
  transition: 0.4s ease;
}
.input-box input[type="button"]:hover{
  opacity: 1;
}
footer .bottom-details{
  width: 100%;
  background: #1e1d1f;
}
footer .bottom-details .bottom_text{
  max-width: 1250px;
  margin: auto;
  padding: 20px 40px;
  display: flex;
  justify-content: space-between;
}
.bottom-details .bottom_text span,
.bottom-details .bottom_text a{
  font-size: 14px;
  font-weight: 300;
  color: #fff;
  opacity: 0.8;
  text-decoration: none;
}
.bottom-details .bottom_text a:hover{
  opacity: 1;
  text-decoration: underline;
}
.bottom-details .bottom_text a{
  margin-right: 10px;
}
@media (max-width: 900px) {
  footer .content .link-boxes{
    flex-wrap: wrap;
  }
  footer .content .link-boxes .input-box{
    width: 40%;
    margin-top: 10px;
  }
}
@media (max-width: 700px){
  footer{
    position: relative;
  }
  .content .top .logo-details{
    font-size: 26px;
  }
  .content .top .media-icons a{
    height: 35px;
    width: 35px;
    font-size: 14px;
    line-height: 35px;
  }
  footer .content .link-boxes .box{
    width: calc(100% / 3 - 10px);
  }
  footer .content .link-boxes .input-box{
    width: 60%;
  }
  .bottom-details .bottom_text span,
  .bottom-details .bottom_text a{
    font-size: 12px;
  }
}
@media (max-width: 520px){
  footer::before{
    top: 145px;
  }
  footer .content .top{
    flex-direction: column;
  }
  .content .top .media-icons{
    margin-top: 16px;
  }
  footer .content .link-boxes .box{
    width: calc(100% / 2 - 10px);
  }
  footer .content .link-boxes .input-box{
    width: 100%;
  }
}
</style>

<?php
echo '    <div class="content">';
echo '        <div class="top">';
echo '            <div class="logo-details">';
echo '                <span class="logo_name">XclusiveGames</span>';
echo '            </div>';
echo '            <div class="media-icons">';
echo '                <a href="#"><i class="fab fa-facebook-f"></i></a>';
echo '                <a href="#"><i class="fab fa-twitter"></i></a>';
echo '                <a href="#"><i class="fab fa-instagram"></i></a>';
echo '                <a href="#"><i class="fab fa-linkedin-in"></i></a>';
echo '                <a href="#"><i class="fab fa-youtube"></i></a>';
echo '            </div>';
echo '        </div>';
echo '        <div class="link-boxes">';
echo '            <ul class="box">';
echo '                <li class="link_name">Comprar por</li>';
echo '                <li><a href="#cat">Categorias</a></li>';
echo '                <li><a href="#cons">Consolas</a></li>';
echo '                <li><a href="juegos.php">Todo</a></li>';
echo '            </ul>';
echo '            <ul class="box">';
echo '                <li class="link_name">Consolas</li>';
echo '                <li><a href="homecon.php?consola=ps4">ps4</a></li>';
echo '                <li><a href="homecon.php?consola=xbox">xbox one</a></li>';
echo '            </ul>';
echo '            <ul class="box">';
echo '                <li class="link_name">Ayuda</li>';
echo '                <li><a href="#">Como comprar</a></li>';
echo '                <li><a href="#">Donde retirar</a></li>';
echo '                <li><a href="#">Preguntas frecuntes</a></li>';
echo '                <li><a href="#">Contactar</a></li>';
echo '            </ul>';
echo '            <ul class="box input-box">';
echo '                <li class="link_name">Pedir juego</li>';
echo '                <li><input type="text" placeholder="Pedilo"></li>';
echo '                <li><input type="button" value="Enviar"></li>';
echo '            </ul>';
echo '        </div>';
echo '    </div>';
echo '    <div class="bottom-details">';
echo '        <div class="bottom_text">';
echo '            <span class="copyright_text">Copyright © 2024 <a href="#">XclusiveGames.</a> All rights reserved</span>';
echo '            <span class="policy_terms">';
echo '                <a href="#">Politica y Privacidad</a>';
echo '                <a href="#">Terminos de Condición</a>';
echo '            </span>';
echo '        </div>';
echo '    </div>';
?>
