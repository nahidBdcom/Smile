
            <div id="social-links" class="d-flex justify-content-center align-items-center">Share:
                <ul>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="social-button social-button-facebook" id="ico-facebook" title="facebook" rel="nofollow noopener noreferrer"><span class="fab fa-facebook"></span></a></li>
                    <li><a href="https://twitter.com/intent/tweet?text={{ urlencode($mainContent["title"]) }}&url={{ url()->current() }}" class="social-button social-button-twitter" id="ico-twitter" title="twitter" rel="nofollow noopener noreferrer"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url={{ url()->current() }}&title={{ urlencode($mainContent["title"]) }}&summary={{ urlencode($mainContent["seo_titlle"]) }}" class="social-button social-button-linkedin" id="ico-linkedin" title="linkedin" rel="nofollow noopener noreferrer"><span class="fab fa-linkedin"></span></a></li>
                    <li><a target="_blank" href="https://wa.me/?text={{ url()->current() }}" class="social-button social-button-whatsapp" id="ico-whatsapp" title="whatsapp" rel="nofollow noopener noreferrer"><span class="fab fa-whatsapp"></span></a></li>
                    <li><a target="_blank" href="https://www.reddit.com/submit?title={{ urlencode($mainContent["title"]) }}&url={{ url()->current() }}" class="social-button social-button-reddit" id="ico-reddit" title="reddit" rel="nofollow noopener noreferrer"><span class="fab fa-reddit"></span></a></li>
                    <li><a target="_blank" href="https://telegram.me/share/url?url={{ url()->current() }}&text={{ urlencode($mainContent["title"]) }}" class="social-button social-button-telegram" id="ico-telegram" title="telegram" rel="nofollow noopener noreferrer"><span class="fab fa-telegram"></span></a></li>
                </ul>
            </div>
            
