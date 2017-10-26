<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-lg-6 col-md-offset-3 col-md-6">
            <div class="card">
                <div class="header">
                    <h3 class="title"><b>Login</b></h3>
                </div>
                <div class="content">
                    <form method="POST">
                        
                        <input id="form-token" type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
                               value="<?= Yii::$app->request->csrfToken ?>"/>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Account & E-Mail</label>
                                    <input type="text" name="username" class="form-control border-input" placeholder="Home Address" value="your account">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control border-input" placeholder="Home Address" value="*****">
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-fill btn-wd">Sign in</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>