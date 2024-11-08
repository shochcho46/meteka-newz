var jsonyear = $('#year').val();
var year = JSON.parse(jsonyear);

var jsonnews = $('#news').val();
var news = JSON.parse(jsonnews);

var jsonview = $('#view').val();
var view = JSON.parse(jsonview);



const yearNewsData = {
    labels: year,
    datasets: [{
            label: 'Total News',
            backgroundColor: [
                'rgba(54, 162, 235,0.3)',
            ],
            borderColor: 'rgba(54, 162, 235)',
            data: news,
            borderWidth: 2,
            borderRadius: 30,
        },

        {
            label: 'Total View',
            type: 'line',

            backgroundColor: [
                'rgba(4, 73, 142,0.3)',
            ],
            borderColor: 'rgba(4, 73, 142)',
            data: view,
            borderWidth: 2,
            pointStyle: 'star',
            pointRadius: 10,
            pointHoverRadius: 15
        }
    ]
};

const yearNewsConfig = {
    type: 'bar',
    data: yearNewsData,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Year Wise Total News & Views',
            }
        },
        animation: {
            onComplete: () => {
                delayed = true;
            },
        },
        responsive: true,
    }
};

const yearNewsChart = new Chart(
    document.getElementById('yearNewsData'),
    yearNewsConfig
);



var jsonMonth = $('#monthName').val();
var monthName = JSON.parse(jsonMonth);

var jsonMonthView = $('#monthView').val();
var monthView = JSON.parse(jsonMonthView);

var jsonMonthNews = $('#monthNews').val();
var monthNews = JSON.parse(jsonMonthNews);


const monthViewData = {
    labels: monthName,
    datasets: [{
            label: 'Total  News',
            backgroundColor: [
                'rgba(38, 156, 237,0.3)',
            ],
            borderColor: 'rgba(38, 156, 237)',
            data: monthNews,
            borderWidth: 2,
            borderRadius: 30,

        },
        {
            label: 'Total View ',
            backgroundColor: [
                'rgba(5, 53, 163 ,0.3)',
            ],
            borderColor: 'rgba(5, 53, 163 )',
            data: monthView,
            type: 'line',
            pointStyle: 'triangle',
            pointRadius: 10,
            pointHoverRadius: 15
        }
    ]
};


const monthViewConfig = {
    type: 'bar',
    data: monthViewData,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Month Wise Total News & View',
            }
        },
        animation: {
            onComplete: () => {
                delayed = true;
            },
        }
    }
};

const monthViewChart = new Chart(
    document.getElementById('monthNewsDataView'),
    monthViewConfig
);


var jsonUserName = $('#userName').val();
var userName = JSON.parse(jsonUserName);

var jsonTotalUpload = $('#totalUpload').val();
var uploadTotalNews = JSON.parse(jsonTotalUpload);


const userUploadData = {
    labels: userName,
    datasets: [{
        label: 'Total News Upload',
        backgroundColor: [
            'rgba(31, 80, 224,0.4)',
        ],
        borderColor: 'rgba(20, 62, 110)',
        data: uploadTotalNews,
        borderWidth: 2,
        borderRadius: 30,
    }]
};


const userUploadViewConfig = {
    type: 'bar',
    data: userUploadData,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Total News Upload By User',
            }
        },
        animation: {
            onComplete: () => {
                delayed = true;
            },
        }
    }
};


const userUploadNewsChart = new Chart(
    document.getElementById('userNewsData'),
    userUploadViewConfig
);



var jsonMainMenu = $('#mainMenu').val();
var mainMenuName = JSON.parse(jsonMainMenu);

var jsonMainMenuNews = $('#mainMenuNews').val();
var mainMenuNewsTotal = JSON.parse(jsonMainMenuNews);


const mainMenuUploadData = {
    labels: mainMenuName,
    datasets: [{
        label: 'Total News',
        backgroundColor: [
            'rgba(66, 185, 245,0.3)',
        ],
        borderColor: 'rgba(34, 86, 112)',
        data: mainMenuNewsTotal,
        borderWidth: 2,
        pointStyle: 'rectRounded',
        pointRadius: 10,
        pointHoverRadius: 15
    }]
};

const mainMenuViewConfig = {
    type: 'radar',
    data: mainMenuUploadData,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Total News Upload By Main Menu',
            }
        },
        animation: {
            onComplete: () => {
                delayed = true;
            },
        }
    }
};

const mainMenuNewsChart = new Chart(
    document.getElementById('userMainCategoryData'),
    mainMenuViewConfig
);



var jsonSubMenu = $('#subMenu').val();
var subMenuName = JSON.parse(jsonSubMenu);

var jsonSubMenuNews = $('#subMenuNews').val();
var subMenuNewsTotal = JSON.parse(jsonSubMenuNews);


const subMenuUploadData = {
    labels: subMenuName,
    datasets: [{
        label: 'Total News',
        backgroundColor: [
            'rgba(2, 87, 245,0.3)',
        ],
        borderColor: 'rgba(2, 87, 245)',
        data: subMenuNewsTotal,
        borderWidth: 2,
        borderRadius: 30,
    }]
};


const subMenuViewConfig = {
    type: 'bar',
    data: subMenuUploadData,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Total News Upload By Sub Menu',
            }
        },
        animation: {
            onComplete: () => {
                delayed = true;
            },
        }
    }
};


const subMenuNewsChart = new Chart(
    document.getElementById('userSubCategoryData'),
    subMenuViewConfig
);



var jsonCurrentMainMenu = $('#currentMainMenu').val();
var currentMainMenuName = JSON.parse(jsonCurrentMainMenu);

var jsonCurrentMainMenuNews = $('#currentMainMenuNews').val();
var currentMainMenuNewsTotal = JSON.parse(jsonCurrentMainMenuNews);


const currentMainMenuUploadData = {
    labels: currentMainMenuName,
    datasets: [{
        label: 'Current Year Total News',
        backgroundColor: [
            'rgba(85, 137, 171,0.3)',
        ],
        borderColor: 'rgba(85, 137, 171)',
        data: currentMainMenuNewsTotal,
        borderWidth: 2,

    }]
};




const currentMainMenuViewConfig = {
    type: 'bar',
    data: currentMainMenuUploadData,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Current Year Total News Main Menu',
            }
        },
        animation: {
            onComplete: () => {
                delayed = true;
            },
        }
    }
};


const currentMainMenuNewsChart = new Chart(
    document.getElementById('currentMainNewsData'),
    currentMainMenuViewConfig
);



var jsonCurrentSubMenu = $('#currentSubMenu').val();
var currentSubMenuName = JSON.parse(jsonCurrentSubMenu);

var jsonCurrentSubMenuNews = $('#currentSubMenuNews').val();
var currentSubMenuNewsTotal = JSON.parse(jsonCurrentSubMenuNews);


const currentSubMenuUploadData = {
    labels: currentSubMenuName,
    datasets: [{
        label: 'Current Year Total News',
        backgroundColor: [
            'rgba(45, 149, 252,0.3)',
        ],
        borderColor: 'rgba(45, 149, 252)',
        data: currentSubMenuNewsTotal,
        pointStyle: 'circle',
        pointRadius: 10,
        pointHoverRadius: 15,
        fill: true,


    }]
};

const currentSubMenuViewConfig = {
    type: 'line',
    data: currentSubMenuUploadData,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Current Year Total News Sub Menu',
            }
        },
        animation: {
            onComplete: () => {
                delayed = true;
            },
        }
    }
};


const currentSubMenuNewsChart = new Chart(
    document.getElementById('currentSubNewsData'),
    currentSubMenuViewConfig
);