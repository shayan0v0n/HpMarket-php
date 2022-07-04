<?php

class QueriesDB {
    public function createTables($pdo) {
        $currentSqlQuery = "CREATE TABLE blog (
            id int not null AUTO_INCREMENT,
            name varchar(100) not null,
            body text not null,
            imgPath varchar(50) null,
            rootPath varchar(100) not null,
            view_count int default 0,
            likes int default 0,
            PRIMARY KEY(id))";
        $pdo-> exec($currentSqlQuery);

        $currentSqlQuery = "CREATE TABLE categories (
            id int not null AUTO_INCREMENT,
            name varchar(100) not null,
            description varchar(250) not null,
            imgPath varchar(50) null,
            rootPath varchar(30) not null,
            PRIMARY KEY(id))";
        $pdo-> exec($currentSqlQuery);

        $currentSqlQuery = "CREATE TABLE products (
            id int not null AUTO_INCREMENT,
            name varchar(100) not null,
            price varchar(50) not null,
            description text not null,
            imgPath varchar(150) null,
            categoryID int NOT NULL,
            isSale boolean default 0,
            isPopular boolean default 0,
            PRIMARY KEY(id))";
        $pdo-> exec($currentSqlQuery);

        $currentSqlQuery = "CREATE TABLE userInfo (
            id int default 1,
            name varchar(100) NOT NULL,
            password varchar(100) NOT NULL,
            email varchar(100) NOT NULL)";
        $pdo-> exec($currentSqlQuery);


        $currentSqlQuery = "CREATE TABLE userProducts (
            id int AUTO_INCREMENT,
            name varchar(100) NOT NULL,
            description varchar(250) NOT NULL,
            imgPath varchar(50),
            isSale boolean NOT NULL,
            isPopular boolean NOT NULL,
            PRIMARY KEY(id))";
        $pdo-> exec($currentSqlQuery);

        $currentSqlQuery = "CREATE TABLE productComments (
            id int AUTO_INCREMENT,
            name varchar(100) NOT NULL,
            comment varchar(250) NOT NULL,
            productID int,
            PRIMARY KEY(id))";
        $pdo-> exec($currentSqlQuery);
        
        $currentSqlQuery = "ALTER TABLE `productComments` ADD FOREIGN KEY (`productID`) REFERENCES `products` (`id`);";
        $pdo-> exec($currentSqlQuery);
        $currentSqlQuery = "ALTER TABLE `products` ADD FOREIGN KEY (`categoryID`) REFERENCES `categories` (`id`);";
        $pdo-> exec($currentSqlQuery);
    }

    public function insertBlogData($pdo) {
        $currentSqlQuery = "INSERT INTO blog
         (name, body, imgPath, rootPath)
         values
         ('لپ تاپ HP Elite Dragonfly G3',
         'آزادی کار کردن به روش شما. سری زیبا و بسیار قابل حمل HP Elite Dragonfly دارای عمر باتری طولانی، بهبودهای همکاری است. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد',
         'HP Elite Dragonfly G3.webp',
         'HP Elite Dragonfly G3'
         )";
        $pdo-> exec($currentSqlQuery);

        $currentSqlQuery = "INSERT INTO blog
         (name, body, imgPath, rootPath)
         values
         ('لپ تاپ HP Spectre x360 14',
         'کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد..',
         'HP Spectre x360 14.webp',
         'HP Spectre x360 14'
         )";
        $pdo-> exec($currentSqlQuery);

        $currentSqlQuery = "INSERT INTO blog
         (name, body, imgPath, rootPath)
         values
         ('لپ تاپ victus 15 2022',
         '. سری زیبا و بسیار قابل حمل victus 15 2022 دارای عمر باتری طولانی، بهبودهای همکاری HP Presence3 و HP Wolf است. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد',
         'victus 15 2022.webp',
         'victus 15 2022'
         )";
        $pdo-> exec($currentSqlQuery);
    }

    public function insertCategoriesData($pdo) {
        $currentSqlQuery = "INSERT INTO categories
            (name, description, imgPath, rootPath)
            values
            ('لپ تاپ بیزنس',
            'ایمن ترین رایانه های شخصی HP با طراحی عالی برای نیروی کار فوق سیار چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است  ',
            'laptopBusiness.png',
            'laptop-business'
        )";
       $pdo-> exec($currentSqlQuery);

        $currentSqlQuery = "INSERT INTO categories
            (name, description, imgPath, rootPath)
            values
            ('دسکتاپ بیزنس',
            'دستگاه‌های HP Thin Client و HP Chrome Enterprise ایمن و قابل مدیریت برای محیط‌های ابری و VDI ساخته شده‌اند.',
            'desktopbusiness.png',
            'desktop-business'
        )";
       $pdo-> exec($currentSqlQuery);

        $currentSqlQuery = "INSERT INTO categories
            (name, description, imgPath, rootPath)
            values
            ('زد ورک استیشن',
            'اعم از طراحی سه بعدی یا اجرای چندین برنامه، مؤلفه های کلاس ایستگاه کاری و گواهینامه های نرم افزار عملکرد را در سراسر گردش کار شما بهینه می کنند.',
            'workstations.png',
            'zworkstation'
        )";
       $pdo-> exec($currentSqlQuery);

        $currentSqlQuery = "INSERT INTO categories
            (name, description, imgPath, rootPath)
            values
            ('لپ تاپ',
            'لپ‌تاپ‌های قابل حمل فوق‌العاده به شما این امکان را می‌دهند که برای تجربه‌ای همهجانبه باورنکردنی، چیزهای بیشتری ببینید، در حالی که به شما امکان می‌دهند از هر کجا خلق کنید..',
            'laptop.png',
            'laptop'
        )";
       $pdo-> exec($currentSqlQuery);

        $currentSqlQuery = "INSERT INTO categories
            (name, description, imgPath, rootPath)
            values
            ('دسک تاپ',
            'سرگرمی خود را تقویت کنید. از دسترسی به مجموعه گسترده ای از گزینه های رسانه با فضای ذخیره سازی کافی و پشتیبانی از تجربه شنیداری فراگیر 5.1 فراگیر لذت ببرید...',
            'desktop.png',
            'desktop'
        )";
       $pdo-> exec($currentSqlQuery);

        $currentSqlQuery = "INSERT INTO categories
            (name, description, imgPath, rootPath)
            values
            ('سیستم گیمینگ',
            'این رایانه‌های شخصی پرقدرت به گونه‌ای طراحی شده‌اند که برای ایجاد محتوا، برنامه‌های کاربردی سخت و درهم شکستن دشمنان، عملکردی را در تغییر بازی به شما ارائه دهند...',
            'laptopGaming.png',
            'laptop-gaming'
        )";
       $pdo-> exec($currentSqlQuery);
    }

    public function insertProductsData($pdo) {
        // LAPTOPBUSENESS
         $currentSqlQuery = "INSERT INTO products
         (name, price, description, imgPath, categoryID, isSale, isPopular)
         values
         ('HP EliteBook 850 G8 Wolf Pro Security Edition',
         '8,000,000',
         'تیم‌ها از مکان‌های زیادی کار می‌کنند و به یک لپ‌تاپ قدرتمند، ایمن و بادوام نیاز دارند که به راحتی متصل شود تا شما را کارآمد نگه دارد. با HP EliteBook 850 نیازهای روز کاری چند کاره، چند مکان و سازمانی را برآورده کنید.',
         'HP EliteBook 850 G8 - Wolf Pro Security Edition.png',
         1,
         1,
         0
         )";
          $pdo-> exec($currentSqlQuery);
          
          $currentSqlQuery = "INSERT INTO products
          (name, price, description, imgPath, categoryID, isSale, isPopular)
          values
          ('HP EliteBook 655 15 inch G9 Notebook PC Wolf Pro Security Edition',
          '12,000,000',
          'HP EliteBook 655 یک رایانه شخصی مقرون به صرفه، قدرتمند و بسیار ایمن است که امکان استانداردسازی آسان را فراهم می کند، در حالی که ابزارهای مورد نیاز را تقریباً از هر کجا به کاربران نهایی می دهد.',
          'HP EliteBook 655 15.6 inch G9 Notebook PC Wolf Pro Security Edition.png',
          1,
          0,
          0
          )";
           $pdo-> exec($currentSqlQuery);
           
           $currentSqlQuery = "INSERT INTO products
           (name, price, description, imgPath, categoryID, isSale, isPopular)
           values
           ('HP ENVY 16 inch Laptop PC',
           '10,000,000',
           'تیم‌ها از مکان‌های زیادی کار می‌کنند و به یک لپ‌تاپ قدرتمند، ایمن و بادوام نیاز دارند که به راحتی متصل شود تا شما را کارآمد نگه دارد. با HP EliteBook 850 نیازهای روز کاری چند کاره، چند مکان و سازمانی را برآورده کنید.',
           'HP ENVY 16 inch Laptop PC.png',
           1,
           0,
           1
           )";
            $pdo-> exec($currentSqlQuery);
            // LAPTOPBUSENESS
            //DECKTOPBUSENESS
            $currentSqlQuery = "INSERT INTO products
            (name, price, description, imgPath, categoryID, isSale, isPopular)
            values
            ('HP Elite Small Form Factor 600 G9 PC Customizable',
            '10,000,000',
            'تیم‌ها از مکان‌های زیادی کار می‌کنند و به یک لپ‌تاپ قدرتمند، ایمن و بادوام نیاز دارند که به راحتی متصل شود تا شما را کارآمد نگه دارد. با HP EliteBook 850 نیازهای روز کاری چند کاره، چند مکان و سازمانی را برآورده کنید.',
            'HP Elite Small Form Factor 600 G9 PC - Customizable.png',
            2,
            1,
            0
            )";
             $pdo-> exec($currentSqlQuery);

            $currentSqlQuery = "INSERT INTO products
            (name, price, description, imgPath, categoryID, isSale, isPopular)
            values
            ('HP EliteOne 800 G6 All In One PC Customizable',
            '9,000,000',
            'دستگاه بسیار نازک 23.8 اینچی HP EliteOne 800 All-in-One با طراحی خیره کننده خود توجه شما را به خود جلب می کند. انتظارات خود را از آنچه که یک AiO می تواند با این قدرتمند انجام دهد، افزایش دهید.',
            'HP EliteOne 800 G6 All-In-One PC - Customizable.png',
            2,
            0,
            0
            )";

            $pdo-> exec($currentSqlQuery);
            $currentSqlQuery = "INSERT INTO products
            (name, price, description, imgPath, categoryID, isSale, isPopular)
            values
            ('HP ProDesk 405 G8 Desktop Mini PC Wolf Pro Security Edition',
            '12,000,000',
            'HP ProDesk 405 Desktop Mini عملکرد تجاری، امنیت و قابلیت‌های استقرار انعطاف‌پذیر مورد نیاز برای فضاهای کاری کوچک را برای کارگران ضروری فراهم می‌کند.',
            'HP ProDesk 405 G8 Desktop Mini PC - Wolf Pro Security Edition.png',
            2,
            0,
            1
            )";
             $pdo-> exec($currentSqlQuery);
             //DECKTOPBUSENESS
             //WORKSTATION
             $currentSqlQuery = "INSERT INTO products
            (name, price, description, imgPath, categoryID, isSale, isPopular)
            values
            ('HP Z4 G4 Workstation Customizable',
            '22,000,000',
            'HP ProDesk 405 Desktop Mini عملکرد تجاری، امنیت و قابلیت‌های استقرار انعطاف‌پذیر مورد نیاز برای فضاهای کاری کوچک را برای کارگران ضروری فراهم می‌کند.',
            'HP Z4 G4 Workstation - Customizable.png',
            3,
            0,
            0
            )";
             
             $pdo-> exec($currentSqlQuery);
             $currentSqlQuery = "INSERT INTO products
            (name, price, description, imgPath, categoryID, isSale, isPopular)
            values
            ('HP Z2 Mini G5 Workstation',
            '27,000,000',
            'در یک دستگاه فوق‌العاده کوچک، عملکرد بالاتری را دریافت کنید. پروژه های طراحی سه بعدی را انجام دهید و در چندین برنامه حرفه ای به راحتی کار کنید. به طور گسترده همه کاره است، این انتخاب واضح برای محل کار مدرن است.',
            'HP Z2 Mini G5 Workstation.png',
            3,
            0,
            0
            )";

            $pdo-> exec($currentSqlQuery);
            $currentSqlQuery = "INSERT INTO products
            (name, price, description, imgPath, categoryID, isSale, isPopular)
            values
            ('HP ZBook Firefly 15 Wolf Pro Security Edition',
            '27,000,000',
            'سبک ترین ZBook 15 اینچی ما تحرک واقعی را برای افرادی فراهم می کند که کامپیوترهای تجاری معمولی را از نقطه شکست خود عبور می دهند. در دفتر یا میدان، با عملکرد حرفه ای و صفحه کلید عددی در اندازه کامل',
            'HP ZBook Firefly 15 - Wolf Pro Security Edition.png',
            3,
            1,
            0
            )";
            
            $pdo-> exec($currentSqlQuery);
             //WORKSTATION
             // LAPTOP DATA
             $currentSqlQuery = "INSERT INTO products 
             (name, price, description, imgPath, categoryID, isSale, isPopular)
             values
             ('HP ProBook 445 G8 Notebook PC Wolf Pro Security Edition',
             '12,000,000',
             'لپ تاپ HP ProBook 445 با طراحی جمع و جور جدید، عملکرد تجاری، امنیت و دوام را در اختیار متخصصان شرکت های در حال رشدی قرار می دهد که از میز به اتاق جلسه به خانه دیگر حرکت می کنند.',
             'HP ProBook 445 G8 Notebook PC - Wolf Pro Security Edition.png',
             4,
             0,
             0
             )";
              $pdo-> exec($currentSqlQuery);
             
             $currentSqlQuery = "INSERT INTO products
             (name, price, description, imgPath, categoryID, isSale, isPopular)
             values
             ('HP 255 G8 Notebook PC',
             '12,000,000',
             'با رایانه لپ‌تاپ HP 255 با فناوری قدرتمند و شاسی ساده‌ای که به راحتی می‌توانید به هر کجا که می‌روید، متصل شوید. وظایف تجاری را با یک پردازنده AMD[2] و ابزارهای همکاری ضروری کامل کنید.',
             'HP 255 G8 Notebook PC.png',
             4,
             0,
             0
             )";
             
             $pdo-> exec($currentSqlQuery);
             $currentSqlQuery = "INSERT INTO products
             (name, price, description, imgPath, categoryID, isSale, isPopular)
             values
             ('HP ProBook 440 G8 Wolf Pro Security Edition',
             '13,000,000',
             'لپ تاپ HP ProBook 440 با طراحی جمع و جور جدید، عملکرد تجاری، امنیت و دوام را در اختیار متخصصان شرکت های در حال رشدی قرار می دهد که از میز به اتاق جلسه به خانه دیگر حرکت می کنند..',
             'HP ProBook 440 G8 - Wolf Pro Security Edition.png',
             4,
             0,
             1
             )";
              $pdo-> exec($currentSqlQuery);
              // LAPTOP DATA
              // DECKTOP
             $currentSqlQuery = "INSERT INTO products
             (name, price, description, imgPath, categoryID, isSale, isPopular)
             values
             ('HP Pavilion Desktop TP01 2165z',
             '21,000,000',
             'کنش واقعی نیاز به عملکرد جدی و دوام آزمایش شده دارد. رایانه رومیزی HP Pavilion عملکرد و قابلیت اطمینان بالایی را از یک برند معتبر ارائه می کند که از آنچه برای شما مهم است محافظت می کند.',
             'HP Pavilion Desktop TP01-2165z.png',
             5,
             0,
             0
             )";
              $pdo-> exec($currentSqlQuery);

             $currentSqlQuery = "INSERT INTO products
             (name, price, description, imgPath, categoryID, isSale, isPopular)
             values
             ('OMEN 30L Gaming Desktop PC GT13 1380z',
             '24,000,000',
             'بهترین دوست جدید خود، شریک بازی خود، رقیب شما در رقابت را ببینید، کامپیوتر رومیزی OMEN 30L دارای یک پردازنده فوق العاده سریع Intel® با یک کارت گرافیک قدرتمند است.',
             'OMEN 30L Gaming Desktop PC GT13-1380z.png',
             5,
             0,
             0
             )";
              $pdo-> exec($currentSqlQuery);

             $currentSqlQuery = "INSERT INTO products
             (name, price, description, imgPath, categoryID, isSale, isPopular)
             values
             ('HP ENVY Desktop TE01 2275xtBundle',
             '22,000,000',
             'خلاقیت خود را تقویت کنید. قدرت و عملکرد را با پردازنده Intel® که فراتر از انتظارات شما طراحی شده است، تجربه کنید. اکنون می توانید محتوای ویدیویی را بهتر از همیشه رندر، ویرایش، پخش و پخش کنید.',
             'HP ENVY Desktop TE01-2275xtBundle.png',
             5,
             1,
             0
             )";
              $pdo-> exec($currentSqlQuery);
              // DECKTOP
              // PC GAMING
              $currentSqlQuery = "INSERT INTO products
              (name, price, description, imgPath, categoryID, isSale, isPopular)
              values
              ('Victus by HP Laptop 16 d1747nr',
              '14,000,000',
              'خلاقیت خود را تقویت کنید. قدرت و عملکرد را با پردازنده Intel® که فراتر از انتظارات شما طراحی شده است، تجربه کنید. اکنون می توانید محتوای ویدیویی را بهتر از همیشه رندر، ویرایش، پخش و پخش کنید.',
              'Victus by HP Laptop 16-d1747nr.png',
              6,
              0,
              0
              )";
               $pdo-> exec($currentSqlQuery);

              $currentSqlQuery = "INSERT INTO products
              (name, price, description, imgPath, categoryID, isSale, isPopular)
              values
              ('Victus by HP Laptop 15t fa000',
              '16,000,000',
              'لپ تاپ HP Victus برای اوج بازی های رایانه شخصی ساخته شده است. این دستگاه شیک یک پردازنده Intel® Core™ نسل دوازدهم[1] و یک کارت گرافیک مدرن را به نمایش می گذارد. طراحی این لپ تاپ به اندازه سخت افزار آن با گزینه های رنگی فراوان چشمگیر است[2]',
              'Victus by HP Laptop 15t-fa000.png',
              6,
              0,
              0
              )";
               $pdo-> exec($currentSqlQuery);

              $currentSqlQuery = "INSERT INTO products
              (name, price, description, imgPath, categoryID, isSale, isPopular)
              values
              ('OMEN by HP Laptop 16z c000',
              '15,000,000',
              'با لپ تاپ گیمینگ 16.1 اینچی اچ پی OMEN فراتر بروید. با پردازنده AMD[1] و گرافیک قدرتمند، از هر کجا به بهترین شکل ممکن بازی کنید.',
              'OMEN by HP Laptop 16z-c000.png',
              6,
              0,
              1
              )";
               $pdo-> exec($currentSqlQuery);

              // PC GAMING
    }
}