<div class="breadcrumb-bar" style="padding-left:5px;padding-right:5px;">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('')?>"><?=$home?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$dashboard?></li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title"><?=$dashboard?></h2>
            </div>
        </div>
    </div>
</div>
<style>
	    #faq {
  max-width: 700px;
  margin: auto;
  padding: 0 15px;
  text-align: center;
}

section.faq {
  padding-top: 2em;
  padding-bottom: 3em;
}

#faq ul {
  text-align: left;
}
.transition, p, ul li i:before, ul li i:after {
  transition: all 0.3s;
}

#faq .no-select, #faq h2 {
  -webkit-tap-highlight-color: transparent;
  -webkit-touch-callout: none;
  user-select: none;
}

#faq h1 {
  color: #000;
  margin-bottom: 30px;
  margin-top: 0;
}

#faq h2 {
  color: #cc071e;
  font-family: 'hm_light', sans-serif;
  font-size: 20px;
  line-height: 34px;
  text-align: left;
  padding: 15px 15px 0;
  text-transform: none;
  font-weight: 300;
  letter-spacing: 1px;
  display: block;
  margin: 0;
  cursor: pointer;
  transition: .2s;
}

#faq p {
  color: #333;
  text-align: left;
  font-family: 'hm_light', sans-serif;
  font-size: 14px;
  line-height: 1.45;
  position: relative;
  overflow: hidden;
  max-height: 250px;
  will-change: max-height;
  contain: layout;
  display: inline-block;
  opacity: 1;
  transform: translate(0, 0);
  margin-top: 5px;
  margin-bottom: 15px;
  padding: 0 50px 0 15px;
  transition: .3s opacity, .6s max-height;
  hyphens: auto;
  z-index: 2;
}

#faq ul {
  list-style: none;
  perspective: 900;
  padding: 0;
  margin: 0;
}
#faq ul li {
  position: relative;
  overflow: hidden;
  padding: 0;
  margin: 0;
  /*padding-bottom: 4px;*/
  /*padding-top: 18px;*/
  background: #fff;
  box-shadow: 0 3px 10px -2px rgba(0,0,0,0.1);
  -webkit-tap-highlight-color: transparent;
}
#faq ul li + li {
  margin-top: 15px;
}
#faq ul li:last-of-type {
  padding-bottom: 0;
}
#faq ul li i {
  position: absolute;
  transform: translate(-6px, 0);
  margin-top: 28px;
  right: 15px;
}
#faq ul li i:before, ul li i:after {
  content: "";
  position: absolute;
  background-color: #cc071e;
  width: 3px;
  height: 9px;
}
#faq ul li i:before {
  transform: translate(-2px, 0) rotate(45deg);
}
#faq ul li i:after {
  transform: translate(2px, 0) rotate(-45deg);
}
#faq ul li input[type=checkbox] {
  position: absolute;
  cursor: pointer;
  width: 100%;
  height: 100%;
  z-index: 1;
  opacity: 0;
  touch-action: manipulation;
}
#faq ul li input[type=checkbox]:checked ~ h2 {
  color: #000;
}
#faq ul li input[type=checkbox]:checked ~ p {
  /*margin-top: 0;*/
  max-height: 0;
  transition: .3s;
  opacity: 0;
  /*transform: translate(0, 50%);*/
}
#faq ul li input[type=checkbox]:checked ~ i:before {
  transform: translate(2px, 0) rotate(45deg);
}
#faq ul li input[type=checkbox]:checked ~ i:after {
  transform: translate(-2px, 0) rotate(-45deg);
}











* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html, body {
  height: 100%;
}

a,
a:visited,
a:focus,
a:active,
a:link {
  text-decoration: none;
  outline: 0;
}

a {
  color: currentColor;
  transition: .2s ease-in-out;
}

h1, h2, h3, h4 {
  margin: .3em 0;
}

ul {
  padding: 0;
  list-style: none;
}

img {
  vertical-align: middle;
  height: auto;
  width: 100%;
}
	</style>
<!-- Page Content -->
<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-body">
								<div class="filter-widget">
									<div class="form-group">
									<label style="font-size: 12px;text-align: justify;"></label>
										<input type="text" class="form-control" placeholder="Type Keyword to find answers">
									</div>			
								</div>
									<div class="btn-search">
										<button type="button" class="btn btn-block">Search</button>
									</div>	
								</div>
							</div>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9">

							<div id="faq">
                          <ul>
                            <li>
                              <input type="checkbox" checked>
                              <i></i>
                              <h2>Hvordan..?</h2>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae debitis iusto voluptatum doloribus rem, qui nesciunt labore tempore fugit iste deserunt incidunt error provident repudiandae laudantium quo ipsa unde perspiciatis, nihil autem distinctio! Deserunt, aspernatur.</p>
                            </li>
                            <li>
                              <input type="checkbox" checked>
                              <i></i>
                              <h2>Hvorfor..?</h2>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente quasi, quia provident facere recusandae itaque assumenda fuga veniam dicta earum dolorem architecto facilis nisi pariatur.</p>
                            </li>
                            <li>
                              <input type="checkbox" checked>
                              <i></i>
                              <h2>Hvad..?</h2>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quas placeat assumenda mollitia magni consequatur dolorum, quod nihil distinctio aperiam officia alias! Voluptate dolore ex officiis sit, magnam non a, eligendi pariatur aut, earum dolores tenetur ipsam id illo deleniti. Laudantium deserunt eaque ipsam voluptatum consequuntur voluptatibus sed minima ad accusamus debitis eos similique laboriosam, molestiae? Consequatur neque tempore quis. Eligendi, in ut aspernatur esse nesciunt libero.</p>
                            </li>
                            <li>
                              <input type="checkbox" checked>
                              <i></i>
                              <h2>Hvordan..?</h2>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae debitis iusto voluptatum doloribus rem, qui nesciunt labore tempore fugit iste deserunt incidunt error provident repudiandae laudantium quo ipsa unde perspiciatis, nihil autem distinctio! Deserunt, aspernatur.</p>
                            </li>
                            <li>
                              <input type="checkbox" checked>
                              <i></i>
                              <h2>Hvorfor..?</h2>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente quasi, quia provident facere recusandae itaque assumenda fuga veniam dicta earum dolorem architecto facilis nisi pariatur.</p>
                            </li>
                            <li>
                              <input type="checkbox" checked>
                              <i></i>
                              <h2>Hvad..?</h2>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quas placeat assumenda mollitia magni consequatur dolorum, quod nihil distinctio aperiam officia alias! Voluptate dolore ex officiis sit, magnam non a, eligendi pariatur aut, earum dolores tenetur ipsam id illo deleniti. Laudantium deserunt eaque ipsam voluptatum consequuntur voluptatibus sed minima ad accusamus debitis eos similique laboriosam, molestiae? Consequatur neque tempore quis. Eligendi, in ut aspernatur esse nesciunt libero.</p>
                            </li>
                          </ul>
                        </div>

				</div>

			</div>		
			<!-- /Page Content -->