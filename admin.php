<?php session_start();
 if(!isset($_SESSION['Admin'])){
        header("Location:scripts/php/admin-login.php");
    }
?>
<?php
    include 'scripts/php/configdb.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/dependencies/bulma-0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="css/dependencies/bulma-0.7.1/css/bulma.css.map">
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/js/dependencies/vue.min.js"></script>
    <script src="scripts/js/dependencies/axios-master/dist/axios.min.js"></script>
</head>

<body>
    <div class="hero is-fullheight is-info">
        <div class="hero-body">
            <div class="container">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

                    <label class="label">
                        <p class="title">Update/Upload database</p>
                    </label>
                    <input type="file" name="StudentList"><br>
                    <button class="button is-primary" value="submit" type="submit" name="submit">Submit XML file</button>
                    <p class="help">XML file only.</p>
                    <hr>
                    <label class="label">
                        <p class="title">Delete current database</p>
                    </label>
                    <button class="button is-warning" value="submit" type="submit" name="deletedb">Delete database</button>
                    <p class="help">WARNING!: this will delete the current existing database.</p>
                </form>
                <hr>
                <div id="view">
                    <label class="label">
                        <p class="title">View database</p>
                    </label>
                    <label class="label">
                        <p class="subtitle">Search Bar Code:</p>
                    </label>
                    <input type="input" class="input" v-model="barCode" name="barCode" placeholder="input Bar Code">
                    <button type="submit" class="button is-primary" @click='searchID()'>Submit</button>
                    <button type="submit" class="button is-primary" @click='viewAll()'>View all records</button>
                    <br><br>
                    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                        <tr>
                            <th>ID</th>
                            <th>Bar Code</th>
                            <th>Name</th>
                            <th>Year/Course</th>
                            <th>Subject</th>
                            <th>Grade</th>
                            <th>Class Card</th>
                            <th>Special Key</th>
                        </tr>
                        <tr v-for="student in students">
                            <td>{{ student.ID }}</td>
                            <td>{{ student.BarCode }}</td>
                            <td>{{ student.Names }}</td>
                            <td>{{ student.YearandCourse }}</td>
                            <td>{{ student.Subject }}</td>
                            <td>{{ student.Grade }}</td>
                            <td>{{ student.ClassCard }}</td>
                            <td>{{ student.SpecialKey }}</td>
                        </tr>
                    </table>
                </div>
                <br><br>
                <button class="button is-danger"><a href="scripts/php/logout.php">Logout</a></button><br><br>
                <h1 class="subtitle has-text-centered">NOTE!: Changed records may not show when uploading a database or xml file when one or more records are changed, this is because MySQL doesn't detect changed rows in XML files. You may delete the database and reupload the updated XML file to insert the changed records.</h1>
            </div>
        </div>
    </div>

    <script>
        let app = new Vue({
            el: '#view',
            data: {
                students: "",
                barCode: ""
            },
            methods: {
                searchID: function() {
                    if (this.barCode > 0) {
                        axios.get('scripts/php/admindb.php', {
                                params: {
                                    barCode: this.barCode
                                }
                            })
                            .then(function(response) {
                                app.students = response.data;
                            })
                            .catch(function(error) {
                                console.log(error);
                            });
                    }
                },
                viewAll: function() {
                    axios.get('scripts/php/admindb.php')
                        .then(function(response) {
                            app.students = response.data;
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                }
            }
        })
    </script>
</body>

</html>