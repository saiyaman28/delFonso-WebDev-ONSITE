<?php require_once "../elements/base_start.php"; require_once "../elements/header.php"; ?>
<title>THE FLEX</title>

<main class="PCMOD-body homepage">
    <div class="pagecontent">
        <div class="welcomesection">
            <div class="greetings">
                Welcome to THE FLEX, <br>
                <?php foreach ($authenticated as $user) { 
                    echo $user['first_name']; ?> <?php echo $user['last_name']; }?> 
            </div>
        </div>
        <div class="rmcarouselsection carousel slide carousel-fade" id="carouselExampleAutoplaying" data-bs-ride="carousel">
            <div class="crsl carousel-inner">
                <div class="crslcontainer carousel-item active" data-bs-interval="7777">
                    <img src="../../static/assets/home page/ROOM-1.png">
                    <div class="text">
                        <div class="title">
                            CYBER CONFERENCE ROOM
                        </div>
                        <div class="description">
                            A cyber conference room is a digital or virtual space designed 
                            to facilitate meetings, presentations, and collaborations over 
                            the internet. It typically includes features such as video 
                            conferencing, screen sharing, chat, document collaboration, 
                            and other tools to support remote communication and teamwork. 
                            The goal of a cyber conference room is to replicate the 
                            experience and functionality of a physical conference room in 
                            an online environment, enabling participants to connect and 
                            interact seamlessly from different locations.
                        </div>
                    </div>
                </div>
                <div class="crslcontainer carousel-item" data-bs-interval="7777">
                    <img src="../../static/assets/home page/ROOM-2.png">
                    <div class="text">
                        <div class="title">
                            APP DEVELOPMENT ROOM
                        </div>
                        <div class="description">
                            An app development room is a specialized space, where teams 
                            focus on designing, building, testing, and deploying software 
                            applications. This environment is equipped with Apple's iMac 
                            for efficient and collaborative app development. 
                        </div>
                    </div>
                </div>
                <div class="crslcontainer carousel-item" data-bs-interval="7777">
                    <img src="../../static/assets/home page/ROOM-3.png">
                    <div class="text">
                        <div class="title">
                            CAPSTONE CONFLUENCE
                        </div>
                        <div class="description">
                            Capstone Confluence is a specialized environment or event where 
                            3rd year students, usually in their final year of study, come 
                            together to showcase their capstone projects. These projects are 
                            typically comprehensive, culminating experiences that integrate 
                            knowledge and skills acquired throughout their academic journey.
                        </div>
                    </div>
                </div>
                <button class="crslbtn carousel-control-prev custom-carousel-control" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="crslbtn carousel-control-next custom-carousel-control" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>
<?php require_once "../elements/footer.php" ?>
</main>
<?php require_once "../elements/base_end.html"; ?>