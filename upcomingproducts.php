<!DOCTYPE html>
<html>
<head>
  <title>Upcoming Items</title>
  <style>
    /* CSS styles for the upcoming items page */
    /* Customize the styles based on your design preferences */
    body{
      background: skyblue;
    }
    .item-card {
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 10px;
      background-color: slategray;
      width: 23.33%;
      display: inline-block;
      box-sizing: border-box;
      vertical-align: top;
      margin-right: 12px;
    }
    .item-card h3 {
      margin-top: 0;
    }
    .item-card img {
      max-width: 100%;
    }
    .countdown {
      color: red;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h1>Upcoming Items</h1>

  <div id="upcoming-items">
    <!-- JavaScript will populate the upcoming items dynamically here -->
  </div>

  <script>
    // JavaScript code to populate the upcoming items dynamically
    // Replace this section with your actual code to fetch and populate the data

    var upcomingItems = [
      {
        name: 'SamSung TV',
        description: 'Introducing the extraordinary 75-inch Samsung TV, a true masterpiece of visual technology available for auction. This stunning television is a gateway to a world of breathtaking entertainment and unparalleled viewing experiences.This TV provides an immersive audio that complements its awe-inspiring visuals. Bid now for the chance to own this remarkable 75-inch Samsung TV, an exceptional centerpiece for your home entertainment system. Experience the pinnacle of visual excellence and redefine how you enjoy your favorite content. Do not miss out on this incredible opportunity.',
        startDateTime: '2023-07-01T12:00:00Z',
        endDateTime: '2023-07-01T12:00:00Z',
        imageUrl: 'admin/assets/uploads/samsung 55-inch-curved-4k-ultra-hd-smart-4t91HRvgq8-original.jpg'
      },
       {
        name: 'Bordeaux-White',
        description: 'This auction-worthy dining table offers ample seating space, accommodating a generous number of guests. Its spacious surface provides an ideal setting for hosting grand dinner parties, family gatherings, or intimate meals. With its stylish and functional design, this table promises to create an ambiance of refined sophistication and luxury.Do not miss this opportunity to own a stunning dining table that will become the centerpiece of your home dining area. Place your bid now and bring elegance and grace to your dining experience.',
        startDateTime: '2023-07-05T14:00:00Z',
       imageUrl: 'admin/assets/uploads/Bordeaux-White.jpg-1.jpg'
      },
      {
        name: 'iPhone 14 Pro max',
        description: 'Introducing the iPhone 14 Pro Max, the pinnacle of smartphone technology, available for auction. This remarkable device is set to redefine the way you engage with your mobile world, delivering an unrivaled experience of innovation, performance, and style.With its sleek and elegant design, the iPhone 14 Pro Max exudes sophistication. Meticulously crafted with premium materials, its seamless blend of glass and metal creates a stunning aesthetic that is both visually striking and luxurious to the touch.',
        startDateTime: '2023-07-05T14:00:00Z',
       imageUrl: 'admin/assets/uploads/1.jpg'
      },
      {
        name: 'Hp Elitebook G2 x360',
        description: 'Introducing the HP EliteBook G2 x360, a versatile and powerful convertible laptop designed to enhance your productivity and adapt to your ever-changing needs. This exceptional device combines cutting-edge technology, sleek design, and robust performance to deliver an unrivaled computing experience.The HP EliteBook G2 x360 boasts a sleek and premium design, with its slim profile and precision-crafted aluminum body.Equipped with the latest Intel Core processors, this laptop delivers outstanding performance and responsiveness. Whether you are multitasking, running demanding applications, or creating content, the EliteBook G2 x360 delivers the power you need to breeze through your tasks with ease.',
        startDateTime: '2023-07-05T14:00:00Z',
        imageUrl: 'admin/assets/uploads/hp eliteg32.jpg'
      },
      {
        name: 'Ducati Panigale V4',
        
        description: 'Introducing the Ducati Panigale V4, a high-performance superbike that represents the pinnacle of Italian engineering and design. This exceptional motorcycle combines cutting-edge technology, jaw-dropping performance, and exquisite craftsmanship, delivering an unparalleled riding experience.The Ducati Panigale V4 boasts a powerful 1103cc Desmosedici Stradale engine, inspired by Ducati is MotoGP racing technology. With a remarkable output of [insert horsepower], this superbike unleashes mind-boggling acceleration and exhilarating speed, propelling you to new levels of adrenaline-fueled excitement.',
        startDateTime: '2023-07-05T14:00:00Z',
        imageUrl: 'admin/assets/uploads/panigale bugatti.jpg'
      },
       {
        name: 'Portraits of the Renaissance',
        description: 'The Renaissance period is recognized for its fervent artistic contributions to European history. A period that constituted countless exceptional artworks, from the likes of Leonardo da Vinci’s Mona Lisa to the Creation of Adam by Michelangelo. The Renaissance movement influenced subsequent movements and significantly inspired the development of art. In this article, we will be exploring the 10 most famous Renaissance portraits that were made between the 15th and 17th centuries.',
        startDateTime: '2023-07-05T14:00:00Z',
        imageUrl: 'admin/assets/uploads/Portraits of the Renaissance.jpg'
      },
       {
        name: 'Redmi-Note-12-Pro',
        description: 'Introducing the Redmi Note 12 Pro, a feature-packed smartphone that combines impressive performance, stunning visuals, and innovative features in one sleek and affordable package. The display is also protected by Corning Gorilla Glass, ensuring durability and safeguarding against scratches and accidental drops.Equipped with a powerful processor and ample RAM, the Redmi Note 12 Pro delivers smooth and responsive performance. Whether you are multitasking, playing graphics-intensive games, or running demanding applications, this smartphone can handle it all with ease.',
        startDateTime: '2023-07-05T14:00:00Z',
        imageUrl: 'admin/assets/uploads/Redmi-Note-12-Pro-1-1.jpg'
      },
       {
        name: 'sofa set',
        description: 'Designed for convenience, the sofa set features thoughtfully placed armrests and spacious seating dimensions, allowing you to stretch out and find your preferred seating position. The sturdy wooden legs provide stability and a touch of sophistication, completing the overall look of the set.Bid now for the opportunity to own this exceptional sofa set that will elevate your living space to new heights of comfort and style. Do not miss out on this chance to create a welcoming and luxurious ambiance in your home.',
        startDateTime: '2023-07-05T14:00:00Z',
        imageUrl: 'admin/assets/uploads/sofa set.jpg'
      },
       {
        name: 'Samsung Galaxy S23 Ultra',
        description: 'Introducing the Samsung Galaxy S23 Ultra, the epitome of smartphone technology, available for auction. This extraordinary device pushes the boundaries of innovation, delivering a seamless fusion of power, performance, and style.The Samsung Galaxy S23 Ultra is equipped with a massive 1TB of storage, ensuring ample space for all your files, photos, videos, and apps. Combined with a substantial 12GB of RAM, this smartphone is a true powerhouse, capable of handling intensive multitasking and running the most demanding applications with ease.Whether you are streaming movies, gaming, or editing photos and videos, every visual is rendered with exceptional clarity and brilliance.Capture moments like a professional with the revolutionary camera system of the Galaxy S23 Ultra.Powered by the latest and most advanced processor, the Galaxy S23 Ultra delivers lightning-fast speeds and unmatched performance.',
        startDateTime: '2023-07-05T14:00:00Z',
        imageUrl: 'admin/assets/uploads/sumsang s23 utra.jpg'
      },
       {
        name: 'Von VART-27NHS fridge',
        description: 'The Von VART-27NHS fridge is also equipped with a frost-free system, eliminating the need for manual defrosting. This convenient feature saves you time and effort, allowing you to focus on more important tasks.With its low noise operation, this fridge ensures a peaceful environment in your kitchen. The efficient compressor runs quietly, minimizing any disruptions and allowing you to enjoy your cooking and dining experiences without distractions.Bid now for the opportunity to own the Von VART-27NHS Double Door Fridge, a reliable and stylish addition to your kitchen. Experience the convenience of ample storage space, efficient cooling, and a sleek silver design. Do not miss out on this chance to enhance your food storage and preservation capabilities with this exceptional fridge.',
        startDateTime: '2023-07-05T14:00:00Z',
        imageUrl: 'admin/assets/uploads/von silver fridge.jpg'
      },
       {
        name: 'MacBook Pro 14',
        description: 'Up for auction is the highly anticipated MacBook Pro 14, a true powerhouse of innovation and performance. This cutting-edge laptop is designed to elevate your productivity, creativity, and overall computing experience to unparalleled heights .With Thunderbolt 4 ports, the MacBook Pro 14 provides lightning-fast data transfer and connectivity options. Whether you need to connect external displays, storage devices, or high-performance peripherals, these versatile ports have you covered. Additionally, the improved battery life keeps you productive throughout the day, allowing you to work, create, and collaborate without interruption.',
        startDateTime: '2023-07-05T14:00:00Z',
        imageUrl: 'admin/assets/uploads/mac book pro 14.jpg'
      },
       {
        name: 'Audi R8',
        description: 'he Audi R8 is not just a car; it is a statement of style and individuality. With a range of customization options available, you can personalize your R8 to reflect your unique taste and preferences.Owning an Audi R8 is more than just owning a car; it is joining an exclusive club of automotive enthusiasts who appreciate the perfect balance of performance and luxury.Do not miss out on this extraordinary opportunity to own the Audi R8, a car that combines breathtaking performance, impeccable design, and unmatched craftsmanship. Place your bid now and embark on a journey of automotive excellence that will leave you exhilarated with every drive.',
        startDateTime: '2023-07-05T14:00:00Z',
        imageUrl: 'admin/assets/uploads/audi R8.jpg'
      },
      
      // Add more items as needed
    ];

    // Function to calculate the countdown timer
    function calculateCountdown(endDateTime) {
      var endTime = new Date(endDateTime).getTime();
      var now = new Date().getTime();
      var timeRemaining = endTime - now

;
      var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
      var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
      return days + "d " + hours + "h " + minutes + "m " + seconds + "s";
    }

    // Function to dynamically populate the upcoming items
    function populateUpcomingItems() {
      var upcomingItemsContainer = document.getElementById('upcoming-items');
      upcomingItems.forEach(function(item) {
        var itemCard = document.createElement('div');
        itemCard.classList.add('item-card');

        var itemName = document.createElement('h3');
        itemName.innerText = item.name;
        itemCard.appendChild(itemName);

        var itemDescription = document.createElement('p');
        itemDescription.innerText = item.description;
        itemCard.appendChild(itemDescription);

        var itemImage = document.createElement('img');
        itemImage.src = item.imageUrl;
        itemCard.appendChild(itemImage);

        var countdownTimer = document.createElement('p');
        countdownTimer.classList.add('countdown');
        countdownTimer.dataset.endDateTime = item.startDateTime;
        countdownTimer.innerText = calculateCountdown(item.startDateTime);
        itemCard.appendChild(countdownTimer);

        upcomingItemsContainer.appendChild(itemCard);
      });

      // Function to update the countdown timer every second
      function updateCountdown() {
        var countdownElements = document.getElementsByClassName('countdown');
        for (var i = 0; i < countdownElements.length; i++) {
          var countdownElement = countdownElements[i];
          var endDateTime = countdownElement.dataset.endDateTime;
          var countdown = calculateCountdown(endDateTime);
          countdownElement.innerText = countdown;
        }
      }

      // Call the function initially to populate the countdown timers
      updateCountdown();

      // Set an interval to update the countdown timers every second
      setInterval(updateCountdown, 1000);
    }

    // Call the function to populate the upcoming items
    populateUpcomingItems();
  </script>
</body>
</html>