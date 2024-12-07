<?php include 'inc/header.php';?>
    <main>
        <section class="width my-5">
            <section class="my-4">
                <h6>Choose language</h6>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>C</option>
                        <option value="1">C++</option>
                        <option value="2">Java</option>
                        <option value="3">Python</option>
                    </select>
            </section>
            <section class="my-5">
                <h6>Write Your Code</h6>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 500px"></textarea>
                        <label for="floatingTextarea2"></label>
                    </div>
            </section>
            
            <div class="my-5">
                <button class="btn btn-lg btn-primary px-5">Submit</button>
            </div>
        </section>
    </main>


    <?php include 'inc/footer.php';?>  