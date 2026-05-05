<style>
    .footer {
    background-color: #111;
    color: #fff;
    padding: 40px 20px;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    font-family: Arial, sans-serif;
    position: relative;
}

.footer-section {
    flex: 1;
    margin: 10px;
    min-width: 200px;
}

.footer-section h3 {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #fff;
}

.footer-section p,
.footer-section ul,
.footer-country {
    font-size: 14px;
    line-height: 1.6;
    width: 325px;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #ccc;
    text-decoration: none;
}

.footer-section ul li a:hover {
    color: #fff;
}

.newsletter-input {
    position: relative;
    display: flex;
    align-items: center;
    border: 1px solid #666;
    border-radius: 5px;
    background-color: #111;
    overflow: hidden;
}

.newsletter-input input {
    padding: 15px;
    border: none;
    color: #fff;
    background-color: #111;
    flex: 1;
    font-size: 14px;
    outline: none;
}

.newsletter-input input:focus ~ label,
.newsletter-input input:not(:placeholder-shown) ~ label {
    transform: translateY(-20px);
    font-size: 12px;
    color: #fff;
}

.newsletter-input label {
    position: absolute;
    left: 15px;
    color: #aaa;
    font-size: 14px;
    pointer-events: none;
    transition: 0.2s ease all;
}

.newsletter-input button {
    padding: 0 15px;
    border: none;
    background-color: transparent;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.newsletter-input button .arrow {
    font-size: 18px;
    font-weight: bold;
}

.newsletter-input input:focus {
    border-color: #fff;
}


.social-icons {
    display: flex;
    gap: 10px;
    margin-top: 10px;

}

.social-icons a {
    color: #fff;
    font-size: 20px;
}


.footer-country {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-top: 15px;
}

.footer-country select {
    background-color: #222;
    color: #fff;
    border: 1px solid #333;
    padding: 5px;
    border-radius: 5px;
}

.footer-accept {
    position: absolute;
    right: 20px;
    bottom: 40px;
    display: flex;
    align-items: center;
    gap: 10px;
    color: #ccc;
}
.company{
    margin-left: 200px;
}
.social{
    margin-left: 200px;
}
.footer-country > a {
    text-decoration: none;
    color: white;
}

.social-icons > ul li a{
    border: 3px solid #fff;
    background-color: #fff;
    border-radius: 50%;
    font-size: 30px;
    display: block;
    position: relative;
    overflow: hidden;
    width: 50px;
    height: 50px;
    z-index: 1;
    text-align: center;
    margin: 0 20px 0 0;
}
.social-icons > ul li {
    list-style: none;
}
.social-icons > ul{
    display: flex;
    position: absolute;
}
.social-icons > ul li a .icon {
  position: relative;
  color: #262626;
  transition: .5s;
  z-index: 3;
}
.social-icons > ul li a:hover .icon {
  color: #fff;
  transform: rotateY(360deg);
}
.social-icons > ul li a:before {
  content: "";
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  height: 100%;
  background: #f00;
  transition: .5s;
  z-index: 2;
}
.social-icons > ul li a:hover:before{
    top: 0;
}

.social-icons > ul li:nth-child(1) a:before{
  background: #3b5999;
}

.social-icons > ul li:nth-child(2) a:before{
    background: #f09433; 
    background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
    background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
    background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 );
}
</style>
<footer class="footer">
    <div class="footer-section">
        <h3>EXPLORE YOUR INNER OLIVIA</h3>
        <p>At Olivia, our mission is to curate a thoughtfully selected collection of high-end fashion, where every detail reflects the elegance, sophistication, and individuality of our clientele. Olivia isn't just a brand; she’s a persona that invites everyone to explore their unique style. In Olivia’s world, self-expression and empowerment through fashion are everyday essentials, encouraging personal discovery within an elegant and captivating atmosphere.</p>
        
        <div class="footer-country">
            <select>
                <option>Vietnam (VND ₫)</option>
                <!-- Add more country options as needed -->
            </select>
            <a href="https://shop-olivia.com">shop-olivia.com</a>
        </div>
    </div>

    <div class="footer-section company">
        <h3>COMPANY</h3>
        <ul>
            <li><a href="#">Our Story</a></li>
            <li><a href="#">Shipping & Deliveries</a></li>
            <li><a href="#">Returns & Exchanges</a></li>
            <li><a href="#">Term and Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>
    </div>

    <div class="footer-section">
        <h3>NEWSLETTER</h3>
        <p>Subscribe to our newsletters to receive the latest styles from coveted designers around the world.</p>
        <div class="newsletter-input form-floating mb-3">
            <input type="email" id="floatingInput" placeholder="">
            <label for="floatingInput">Your e-mail</label>
            <button type="submit"><span class="arrow">→</span></button>
        </div>
    </div>
    <div class="footer-section social">
        <h3>FOLLOW US</h3>
        <div class="social-icons">
        <ul>
            <li>
                <a href="https://www.facebook.com/OliviaBoutiquePage/" target="_blank">
                    <i class="fab fa-facebook-f icon"></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/oliviaboutique/?hl=es-la" target="_blank">
                    <i class="fa-brands fa-instagram icon"></i>
                </a>
            </li>
        </ul>
    </div>
</footer>
