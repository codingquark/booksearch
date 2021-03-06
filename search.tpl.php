<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Results</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="implementing bootstrap">
        <meta name="author" content="Dhavan Vaidya">
		
		<link rel="shortcut icon" href="favicon.ico">

        <!--bootstrap-->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <style type="text/css">
            
            /* Sticky footer styles-------------------------------------------------- */

            html,
            body {
                height: 100%;
            /* The html and body elements cannot have any padding or margin. */
            }

            /* Wrapper for page content to push down footer */
            #wrap {
                min-height: 100%;
                height: auto !important;
                height: 100%;
                /* Negative indent footer by it's height */
                margin: 0 auto -60px;
            }

            /* Set the fixed height of the footer here */
            #push,
            #footer {
                height: 40px;
            }
            #footer {
                background-color: #f5f5f5;
            }

            /* Lastly, apply responsive CSS fixes as necessary */
            @media (max-width: 767px) {
                #footer {
                    margin-left: -20px;
                    margin-right: -20px;
                    padding-left: 20px;
                    padding-right: 20px;
                }
            }
        </style>

        <link rel="stylesheet" href="assets/css/bootstrap-responsive.css">

        <!-- HTML5 shim, for IE6-8 sopport of HTML5 elements -->
        <!-- [if lt IE9] >
            <script src="../css/bootstrap/js/html5shiv.js"></script>
        <![endif]-->
</head>
<body>
    <div id="wrap">

        <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="./">GAIMS</a>

                <div class="nav-collapse collapse">
                    <ul class="nav">                        
                        <li><a href="./searchAuthor.html">Author</a></li>
						<li><a href="./searchSubject.html">Subject</a></li>
                    </ul>
                    <form class="navbar-form pull-right" action="search.php" method="GET" name="searchForm" onsubmit="return validateForm()">
                        <input class="span4" type="text" name="query" placeholder="Search"/>
                        <input class="btn btn-primary span1" value="Go" type="submit" />
                    </form>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        </div>

        <div id="push"></div><!-- To manage spacing with Navbar -->

        <?php $this->RenderBegin(); ?>

        <div class="container">
            
            <table class="table table-condensed table-striped">
                <thead>
                    <th class="span3">Edition</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Subject</th>
                </thead>
            
            <tbody>

            <?php 
                
                foreach ($this->result as $value) {

                    echo '<td>';
                    _p($value->Edtion);
                    echo '</td>';
                    
                    echo '<td>';
                    _p($value->Title);
                    echo '</td>';

                    echo '<td>';
                    _p($value->Author);
                    echo '</td>';

                    echo '<td>';
                    _p($value->Sub);
                    echo '</td>';

                    echo '</tr>';
                 }
                 
            ?>

            <?php $this->RenderEnd(); ?>

            </tbody>
            </table>
        </div>

        </div>
		
		<div id="push"></div><!-- To manage spacing with Footer -->

        <div id="footer">
            <div class="container">
                <p class="muted credit">Made by &copy Dhavan & Osho</p>
            </div>
        </div>
       

        <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script>
		function validateForm()
		{
			var x=document.forms["searchForm"]["query"].value;
			if (x==null || x=="")
			{
				return false;
			}
		}
	</script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

</body>
