<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Proyal  Online Auction System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        /* .navbar {
          background-color: #333;
          color: #fff;
          padding: 30px;
          display: flex;
          justify-content: flex-end;
      }
       .navbar a {
           color: #fff;
           text-decoration: none;
           padding: 10px;
           margin-right: 2px;
       } */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        #typing-container {
            font-size: 18px;
            color: #333;
            background-color: skyblue;
            line-height: 1.5;
            white-space: pre-line;
            margin-top: 15%;
            font-family: Arial, sans-serif;
            padding: 20px;
            border: 1px solid #ccc;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
  <!-- <div class="navbar">
       <a href="#">Home</a>
       <a href="index.php?page=about">About Us</a>
       <a href="#">Products</a>
       <a href="#">Contact</a>
   </div> -->
    <div class="container">
        <div id="typing-container"></div>
    </div>
    <script>
        var text = "Welcome to Proyal Auction System Where We Make Dreams To be A reality!\n\nWe are delighted to welcome you to Proyal Auction System, the premier online platform for buying and selling a wide range of items through auctions. Whether you're a passionate collector, an enthusiastic seller, or simply looking for unique treasures, you've come to the right place.\n\nAt Proyal Auction System, we strive to create a seamless and enjoyable auction experience for our users. Our platform offers a vast selection of items, including rare antiques, fine art, exquisite jewelry, vintage automobiles, and much more. Our dedicated team works diligently to curate an exceptional collection that caters to various interests and tastes.\n\nAs a registered user, you gain access to a wealth of features and benefits. You can browse through our diverse catalog, place bids on your favorite items, track your auctions in real-time, and receive notifications on the status of your bids. Our user-friendly interface and intuitive navigation make it effortless to explore and engage with the auction process.\n\nProyal Auction System is built on trust, transparency, and reliability. We take great pride in maintaining a secure environment for all our users. We carefully vet sellers, authenticate items, and ensure that every transaction is conducted with the utmost integrity. Your satisfaction and confidence in our platform are our top priorities.\n\nWhether you're an experienced auction participant or new to the world of bidding, our knowledgeable support team is always ready to assist you. We provide comprehensive assistance, answering your questions, addressing concerns, and guiding you through the entire auction process. Your journey with Proyal Auction System is backed by our commitment to exceptional customer service.\n\nThank you for choosing Proyal Auction System. We invite you to explore our website, discover extraordinary treasures, and engage in exciting bidding wars. Join our vibrant community of passionate collectors, savvy sellers, and auction enthusiasts. We look forward to delivering an exceptional auction experience and being your trusted partner in the thrilling world of auctions.\n\nBest regards,\nThe Proyal Auction System Team";
        var speed = 20; // Typing speed in milliseconds
        var container = document.getElementById('typing-container');
        var index = 0;

        function typeWriter() {
      if (index < text.length) {
          if (index < 70) { // Check the character range for the first paragraph
              container.innerHTML += '<span style="color: white; font-weight: bold;">' + text.charAt(index) + '</span>'; // Apply red color to the first paragraph
          } else {
              container.innerHTML += text.charAt(index);
          }
          index++;
          setTimeout(typeWriter, speed);
      }
  }



        typeWriter(); // Start the typing animation
    </script>
</body>
</html>
