<?php

function component($productid,$productName, $productMg, $productPrice, $productUsedfor, $productSideEffects){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"Bill.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <span class=\"price\">$productName</span>
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productMg</h5>
                            <h5>
                                <span class=\"price\">$$productPrice</span>
                            </h5>
                            <h5>
                                <span class=\"price\">$productUsedfor</span>
                            </h5>
                            <h5>
                                <span class=\"price\">$productSideEffects</span>
                            </h5>

                            <button type=\"submit\" class=\"btn btn-success my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productName, $productPrice, $productUsedfor, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <h1>$productName</h1>
                            </div>
                            <div class=\"col-md-6\">
                                <h4 class=\"pt-2\">$productUsedfor</h4>
                                <h5 class=\"pt-2\">$productid</h5>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h5 id=\"pPrice\" class=\"pt-2\">$$productPrice</h5>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\" onclick=\"sweetAlert('Congratulation!', 'You successfully copy paste this code', 'success', 3000, false)\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <input type=\"text\" id=\"quantity\"  class=\"form-control w-25 d-inline\">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}