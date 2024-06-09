<?php
session_start();
require_once '../../config/config.php';
if (!isset($_SESSION['login'])) {
    header("location: http://localhost/pencarian_pintar_lontar/pages/admin/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lontar Bali</title>
    <link rel="stylesheet" href="../../src/output.css">
    <link rel="stylesheet" href="../../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body class="font-montserrat">

    <!-- navigation Top -->
    <nav class="fixed top-0 z-50 w-full border-b border-gray-200 bg-darkBlue dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>

                    <a href="#" class="flex ms-4 md:me-24">
                        <svg class="h-9 w-auto" width="236" height="70" viewBox="0 0 236 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32.96 43.08C33.3067 43.08 33.5733 43.24 33.76 43.56C33.9733 43.88 34.08 44.32 34.08 44.88C34.08 45.92 33.8267 46.7467 33.32 47.36C31.8267 49.1467 30.3733 50.4 28.96 51.12C27.5733 51.84 25.8933 52.2 23.92 52.2C22.5333 52.2 21.2533 52.0267 20.08 51.68C18.9067 51.3333 17.48 50.8133 15.8 50.12C14.28 49.4533 12.8133 48.9067 11.4 48.48C10.04 50.96 8 52.2 5.28 52.2C3.78667 52.2 2.6 51.8667 1.72 51.2C0.813333 50.5067 0.36 49.6267 0.36 48.56C0.36 47.2533 0.986667 46.1733 2.24 45.32C3.49333 44.44 5.16 44 7.24 44H7.76L8.48 32.36C8.64 29.6933 9.12 27.4933 9.92 25.76C10.72 24.0267 11.8267 22.5467 13.24 21.32C14.4667 20.2533 15.8667 19.4533 17.44 18.92C19.0133 18.36 20.68 18.08 22.44 18.08C25.32 18.08 27.5333 18.8267 29.08 20.32C30.6267 21.8133 31.4 23.76 31.4 26.16C31.4 27.7867 31.1067 29.1067 30.52 30.12C29.9333 31.1067 29.12 31.6 28.08 31.6C27.3333 31.6 26.7467 31.4267 26.32 31.08C25.8933 30.7067 25.68 30.1867 25.68 29.52C25.68 29.28 25.7333 28.84 25.84 28.2C26 27.4533 26.08 26.7867 26.08 26.2C26.08 25.08 25.7467 24.2 25.08 23.56C24.44 22.8933 23.4533 22.56 22.12 22.56C19.7733 22.56 17.96 23.3333 16.68 24.88C15.4 26.4 14.5867 28.8 14.24 32.08L13.32 41.16C13.1867 42.44 13.0133 43.5467 12.8 44.48C14.5067 44.7733 16.64 45.24 19.2 45.88C20.6933 46.2533 21.84 46.52 22.64 46.68C23.44 46.84 24.1467 46.92 24.76 46.92C26.3067 46.92 27.6267 46.6667 28.72 46.16C29.84 45.6267 30.8933 44.7867 31.88 43.64C32.2 43.2667 32.56 43.08 32.96 43.08ZM54.4372 39.72C54.7839 39.72 55.0505 39.8933 55.2372 40.24C55.4239 40.5867 55.5172 41.0267 55.5172 41.56C55.5172 42.84 55.1305 43.6 54.3572 43.84C52.7572 44.4 50.9972 44.72 49.0772 44.8C48.5705 47.04 47.5705 48.84 46.0772 50.2C44.5839 51.5333 42.8905 52.2 40.9972 52.2C39.3972 52.2 38.0239 51.8133 36.8772 51.04C35.7572 50.2667 34.9039 49.24 34.3172 47.96C33.7305 46.68 33.4372 45.2933 33.4372 43.8C33.4372 41.7733 33.8239 39.9733 34.5972 38.4C35.3705 36.8 36.4372 35.56 37.7972 34.68C39.1572 33.7733 40.6639 33.32 42.3172 33.32C44.3439 33.32 45.9705 34.0267 47.1972 35.44C48.4505 36.8267 49.1839 38.5467 49.3972 40.6C50.6505 40.52 52.1439 40.2533 53.8772 39.8C54.0905 39.7467 54.2772 39.72 54.4372 39.72ZM41.3172 47.96C42.1705 47.96 42.9039 47.6133 43.5172 46.92C44.1572 46.2267 44.5839 45.2267 44.7972 43.92C43.9705 43.36 43.3305 42.6267 42.8772 41.72C42.4505 40.8133 42.2372 39.8533 42.2372 38.84C42.2372 38.4133 42.2772 37.9867 42.3572 37.56H42.1572C41.0905 37.56 40.1972 38.08 39.4772 39.12C38.7839 40.1333 38.4372 41.5733 38.4372 43.44C38.4372 44.9067 38.7172 46.0267 39.2772 46.8C39.8639 47.5733 40.5439 47.96 41.3172 47.96ZM54.9241 52.2C53.9107 52.2 53.1907 51.6667 52.7641 50.6C52.3641 49.5333 52.1641 47.8267 52.1641 45.48C52.1641 42.0133 52.6574 38.72 53.6441 35.6C53.8841 34.8267 54.2707 34.2667 54.8041 33.92C55.3641 33.5467 56.1374 33.36 57.1241 33.36C57.6574 33.36 58.0307 33.4267 58.2441 33.56C58.4574 33.6933 58.5641 33.9467 58.5641 34.32C58.5641 34.7467 58.3641 35.7067 57.9641 37.2C57.6974 38.2667 57.4841 39.2 57.3241 40C57.1641 40.8 57.0307 41.7867 56.9241 42.96C57.8041 40.6667 58.7907 38.8 59.8841 37.36C60.9774 35.92 62.0441 34.8933 63.0841 34.28C64.1507 33.6667 65.1241 33.36 66.0041 33.36C67.7374 33.36 68.6041 34.2267 68.6041 35.96C68.6041 37 68.3107 38.88 67.7241 41.6C67.2174 43.92 66.9641 45.4533 66.9641 46.2C66.9641 47.2667 67.3507 47.8 68.1241 47.8C68.6574 47.8 69.2841 47.48 70.0041 46.84C70.7507 46.1733 71.7374 45.1067 72.9641 43.64C73.2841 43.2667 73.6441 43.08 74.0441 43.08C74.3907 43.08 74.6574 43.24 74.8441 43.56C75.0574 43.88 75.1641 44.32 75.1641 44.88C75.1641 45.9467 74.9107 46.7733 74.4041 47.36C73.2574 48.7733 72.0174 49.9333 70.6841 50.84C69.3774 51.7467 67.8841 52.2 66.2041 52.2C64.8441 52.2 63.8174 51.8133 63.1241 51.04C62.4307 50.24 62.0841 49.0933 62.0841 47.6C62.0841 46.8533 62.2707 45.52 62.6441 43.6C62.9907 41.92 63.1641 40.76 63.1641 40.12C63.1641 39.6933 63.0174 39.48 62.7241 39.48C62.3774 39.48 61.8841 39.9333 61.2441 40.84C60.6307 41.72 59.9907 42.8933 59.3241 44.36C58.6841 45.8267 58.1641 47.3733 57.7641 49C57.4707 50.2533 57.1241 51.1067 56.7241 51.56C56.3507 51.9867 55.7507 52.2 54.9241 52.2ZM89.7678 43.08C90.1145 43.08 90.3811 43.24 90.5678 43.56C90.7811 43.88 90.8878 44.32 90.8878 44.88C90.8878 45.9467 90.6345 46.7733 90.1278 47.36C88.9811 48.7733 87.7278 49.9333 86.3678 50.84C85.0078 51.7467 83.4478 52.2 81.6878 52.2C76.2478 52.2 73.5278 48.3733 73.5278 40.72C73.5278 39.5467 73.5678 38.36 73.6478 37.16H72.0878C71.2878 37.16 70.7411 37.0133 70.4478 36.72C70.1811 36.4267 70.0478 35.96 70.0478 35.32C70.0478 33.8267 70.6478 33.08 71.8478 33.08H74.1278C74.5811 30.1467 75.2745 27.4667 76.2078 25.04C77.1411 22.6133 78.2611 20.68 79.5678 19.24C80.9011 17.8 82.3278 17.08 83.8478 17.08C84.9678 17.08 85.8478 17.5733 86.4878 18.56C87.1278 19.5467 87.4478 20.7867 87.4478 22.28C87.4478 26.4133 85.7145 30.0133 82.2478 33.08H86.7278C87.1545 33.08 87.4611 33.1733 87.6478 33.36C87.8345 33.5467 87.9278 33.8933 87.9278 34.4C87.9278 36.24 86.4211 37.16 83.4078 37.16H78.5278C78.4745 38.4933 78.4478 39.5333 78.4478 40.28C78.4478 43.0533 78.7678 45 79.4078 46.12C80.0745 47.24 81.1145 47.8 82.5278 47.8C83.6745 47.8 84.6878 47.4533 85.5678 46.76C86.4478 46.0667 87.4878 45.0267 88.6878 43.64C89.0078 43.2667 89.3678 43.08 89.7678 43.08ZM82.7678 20.92C82.3678 20.92 81.9145 21.4267 81.4078 22.44C80.9278 23.4267 80.4611 24.8133 80.0078 26.6C79.5811 28.36 79.2211 30.32 78.9278 32.48C80.5011 31.12 81.6745 29.6 82.4478 27.92C83.2478 26.2133 83.6478 24.6667 83.6478 23.28C83.6478 21.7067 83.3545 20.92 82.7678 20.92ZM92.5509 52.2C90.8976 52.2 89.5776 51.6 88.5909 50.4C87.6043 49.2 87.1109 47.6267 87.1109 45.68C87.1109 43.5467 87.6043 41.5333 88.5909 39.64C89.5776 37.72 90.8843 36.1867 92.5109 35.04C94.1643 33.8667 95.9109 33.28 97.7509 33.28C98.3376 33.28 98.7243 33.4 98.9109 33.64C99.1243 33.8533 99.2976 34.2533 99.4309 34.84C99.9909 34.7333 100.578 34.68 101.191 34.68C102.498 34.68 103.151 35.1467 103.151 36.08C103.151 36.64 102.951 37.9733 102.551 40.08C101.938 43.1467 101.631 45.28 101.631 46.48C101.631 46.88 101.724 47.2 101.911 47.44C102.124 47.68 102.391 47.8 102.711 47.8C103.218 47.8 103.831 47.48 104.551 46.84C105.271 46.1733 106.244 45.1067 107.471 43.64C107.791 43.2667 108.151 43.08 108.551 43.08C108.898 43.08 109.164 43.24 109.351 43.56C109.564 43.88 109.671 44.32 109.671 44.88C109.671 45.9467 109.418 46.7733 108.911 47.36C107.818 48.72 106.658 49.8667 105.431 50.8C104.204 51.7333 103.018 52.2 101.871 52.2C100.991 52.2 100.178 51.9067 99.4309 51.32C98.7109 50.7067 98.1643 49.88 97.7909 48.84C96.4043 51.08 94.6576 52.2 92.5509 52.2ZM93.9909 48.16C94.5776 48.16 95.1376 47.8133 95.6709 47.12C96.2043 46.4267 96.5909 45.5067 96.8309 44.36L98.3109 37C97.1909 37.0267 96.1509 37.4533 95.1909 38.28C94.2576 39.08 93.5109 40.1467 92.9509 41.48C92.3909 42.8133 92.1109 44.2267 92.1109 45.72C92.1109 46.5467 92.2709 47.16 92.5909 47.56C92.9376 47.96 93.4043 48.16 93.9909 48.16ZM122.58 38.84C123.167 38.84 123.66 39.0533 124.06 39.48C124.487 39.88 124.7 40.3867 124.7 41C124.7 41.3467 124.62 41.72 124.46 42.12C124.033 43.1067 123.433 43.9333 122.66 44.6C121.887 45.2667 121.033 45.6 120.1 45.6C119.353 45.6 118.713 45.3333 118.18 44.8C117.673 44.2667 117.42 43.5467 117.42 42.64C117.42 42.1333 117.447 41.5867 117.5 41C117.553 40.5733 117.58 40.28 117.58 40.12C117.58 39.9067 117.527 39.7467 117.42 39.64C117.34 39.5333 117.233 39.48 117.1 39.48C116.727 39.48 116.22 39.9333 115.58 40.84C114.94 41.72 114.3 42.8933 113.66 44.36C113.02 45.8267 112.5 47.3733 112.1 49C111.807 50.28 111.473 51.1333 111.1 51.56C110.727 51.9867 110.113 52.2 109.26 52.2C108.247 52.2 107.527 51.6667 107.1 50.6C106.7 49.5333 106.5 47.8267 106.5 45.48C106.5 42.0133 106.993 38.72 107.98 35.6C108.22 34.8267 108.607 34.2667 109.14 33.92C109.7 33.5467 110.473 33.36 111.46 33.36C111.993 33.36 112.367 33.4267 112.58 33.56C112.793 33.6933 112.9 33.9467 112.9 34.32C112.9 34.7467 112.7 35.7067 112.3 37.2C112.033 38.2667 111.82 39.2 111.66 40C111.5 40.8 111.367 41.7867 111.26 42.96C112.14 40.6667 113.127 38.8 114.22 37.36C115.313 35.92 116.38 34.8933 117.42 34.28C118.46 33.6667 119.407 33.36 120.26 33.36C121.033 33.36 121.62 33.5867 122.02 34.04C122.447 34.4667 122.66 35.1067 122.66 35.96C122.66 36.4667 122.513 37.4267 122.22 38.84H122.58ZM169.611 26.4C169.611 28.6667 168.811 30.6267 167.211 32.28C165.611 33.9067 163.277 35.08 160.211 35.8C161.864 36.2533 163.117 37 163.971 38.04C164.824 39.0533 165.251 40.2267 165.251 41.56C165.251 43.6667 164.584 45.4933 163.251 47.04C161.944 48.5867 160.024 49.7867 157.491 50.64C154.957 51.4667 151.904 51.88 148.331 51.88C146.997 51.88 145.931 51.84 145.131 51.76C145.104 52.5067 144.784 53.0667 144.171 53.44C143.557 53.8133 142.771 54 141.811 54C140.851 54 140.184 53.7867 139.811 53.36C139.464 52.9333 139.317 52.3067 139.371 51.48C139.611 47.7467 140.077 43.84 140.771 39.76C141.464 35.6533 142.344 31.6933 143.411 27.88C143.597 27.2133 143.971 26.7467 144.531 26.48C145.091 26.2133 145.824 26.08 146.731 26.08C148.357 26.08 149.171 26.5333 149.171 27.44C149.171 27.8133 149.091 28.24 148.931 28.72C148.237 30.8 147.544 33.6267 146.851 37.2C146.157 40.7467 145.664 44.1333 145.371 47.36C146.651 47.4667 147.691 47.52 148.491 47.52C152.224 47.52 154.957 46.9867 156.691 45.92C158.451 44.8267 159.331 43.44 159.331 41.76C159.331 40.5867 158.824 39.6 157.811 38.8C156.824 38 155.157 37.56 152.811 37.48C152.277 37.4533 151.904 37.32 151.691 37.08C151.477 36.84 151.371 36.4533 151.371 35.92C151.371 35.1467 151.531 34.52 151.851 34.04C152.171 33.56 152.757 33.3067 153.611 33.28C155.504 33.2267 157.211 32.9467 158.731 32.44C160.277 31.9333 161.491 31.2267 162.371 30.32C163.251 29.3867 163.691 28.3067 163.691 27.08C163.691 25.5333 162.931 24.32 161.411 23.44C159.891 22.5333 157.557 22.08 154.411 22.08C151.557 22.08 148.797 22.4533 146.131 23.2C143.464 23.92 141.197 24.84 139.331 25.96C138.477 26.4667 137.757 26.72 137.171 26.72C136.691 26.72 136.317 26.56 136.051 26.24C135.811 25.8933 135.691 25.4667 135.691 24.96C135.691 24.2933 135.824 23.72 136.091 23.24C136.384 22.76 137.064 22.2133 138.131 21.6C140.371 20.32 142.997 19.32 146.011 18.6C149.024 17.88 152.104 17.52 155.251 17.52C160.077 17.52 163.677 18.3333 166.051 19.96C168.424 21.5867 169.611 23.7333 169.611 26.4ZM173.215 52.2C171.562 52.2 170.242 51.6 169.255 50.4C168.268 49.2 167.775 47.6267 167.775 45.68C167.775 43.5467 168.268 41.5333 169.255 39.64C170.242 37.72 171.548 36.1867 173.175 35.04C174.828 33.8667 176.575 33.28 178.415 33.28C179.002 33.28 179.388 33.4 179.575 33.64C179.788 33.8533 179.962 34.2533 180.095 34.84C180.655 34.7333 181.242 34.68 181.855 34.68C183.162 34.68 183.815 35.1467 183.815 36.08C183.815 36.64 183.615 37.9733 183.215 40.08C182.602 43.1467 182.295 45.28 182.295 46.48C182.295 46.88 182.388 47.2 182.575 47.44C182.788 47.68 183.055 47.8 183.375 47.8C183.882 47.8 184.495 47.48 185.215 46.84C185.935 46.1733 186.908 45.1067 188.135 43.64C188.455 43.2667 188.815 43.08 189.215 43.08C189.562 43.08 189.828 43.24 190.015 43.56C190.228 43.88 190.335 44.32 190.335 44.88C190.335 45.9467 190.082 46.7733 189.575 47.36C188.482 48.72 187.322 49.8667 186.095 50.8C184.868 51.7333 183.682 52.2 182.535 52.2C181.655 52.2 180.842 51.9067 180.095 51.32C179.375 50.7067 178.828 49.88 178.455 48.84C177.068 51.08 175.322 52.2 173.215 52.2ZM174.655 48.16C175.242 48.16 175.802 47.8133 176.335 47.12C176.868 46.4267 177.255 45.5067 177.495 44.36L178.975 37C177.855 37.0267 176.815 37.4533 175.855 38.28C174.922 39.08 174.175 40.1467 173.615 41.48C173.055 42.8133 172.775 44.2267 172.775 45.72C172.775 46.5467 172.935 47.16 173.255 47.56C173.602 47.96 174.068 48.16 174.655 48.16ZM202.244 43.08C202.591 43.08 202.857 43.24 203.044 43.56C203.257 43.88 203.364 44.32 203.364 44.88C203.364 45.9467 203.111 46.7733 202.604 47.36C201.457 48.7733 200.204 49.9333 198.844 50.84C197.511 51.7467 195.991 52.2 194.284 52.2C191.937 52.2 190.191 51.1333 189.044 49C187.924 46.8667 187.364 44.1067 187.364 40.72C187.364 37.4667 187.777 33.76 188.604 29.6C189.457 25.44 190.697 21.8667 192.324 18.88C193.977 15.8933 195.937 14.4 198.204 14.4C199.484 14.4 200.484 15 201.204 16.2C201.951 17.3733 202.324 19.0667 202.324 21.28C202.324 24.4533 201.444 28.1333 199.684 32.32C197.924 36.5067 195.537 40.6533 192.524 44.76C192.711 45.8533 193.017 46.64 193.444 47.12C193.871 47.5733 194.431 47.8 195.124 47.8C196.217 47.8 197.177 47.4933 198.004 46.88C198.831 46.24 199.884 45.16 201.164 43.64C201.484 43.2667 201.844 43.08 202.244 43.08ZM197.324 18.36C196.711 18.36 196.017 19.4667 195.244 21.68C194.471 23.8933 193.791 26.64 193.204 29.92C192.617 33.2 192.297 36.3467 192.244 39.36C194.137 36.24 195.644 33.12 196.764 30C197.884 26.8533 198.444 23.9867 198.444 21.4C198.444 19.3733 198.071 18.36 197.324 18.36ZM205.651 30.72C204.531 30.72 203.691 30.4667 203.131 29.96C202.571 29.4267 202.291 28.6933 202.291 27.76C202.291 26.8267 202.651 26.0533 203.371 25.44C204.118 24.8 205.038 24.48 206.131 24.48C207.118 24.48 207.918 24.72 208.531 25.2C209.144 25.68 209.451 26.36 209.451 27.24C209.451 28.3067 209.104 29.16 208.411 29.8C207.718 30.4133 206.798 30.72 205.651 30.72ZM201.811 52.2C200.958 52.2 200.371 52.0267 200.051 51.68C199.731 51.3333 199.571 50.7867 199.571 50.04C199.571 49.8267 199.598 49.4533 199.651 48.92C200.078 44.04 200.784 39.6 201.771 35.6C201.984 34.7733 202.331 34.2 202.811 33.88C203.318 33.5333 204.118 33.36 205.211 33.36C206.358 33.36 206.931 33.8267 206.931 34.76C206.931 34.8933 206.904 35.1467 206.851 35.52C205.651 41.2267 204.931 46.0133 204.691 49.88C204.638 50.7333 204.384 51.3333 203.931 51.68C203.478 52.0267 202.771 52.2 201.811 52.2Z" fill="#F9B17A" />
                            <path d="M109.5 62.5H205.5" stroke="#F9B17A" stroke-width="3" />
                        </svg>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center gap-5 ms-3">
                        <h2 class="text-white font-montsMedium"><?= $_SESSION['nama']; ?></h2>
                        <div>
                            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="../../public/assets/DashboardImage.jpg" alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    Admin
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="http://localhost/pencarian_pintar_lontar/pages/admin/DetailDataAdmin.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Profile</a>
                                </li>
                                <li>
                                    <a href="http://localhost/pencarian_pintar_lontar/apps/Logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- end top navigation -->

    <!-- sidebar -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-darkBlue border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full flex flex-col gap-[550px] px-3 pb-4 overflow-y-auto bg-darkBlue dark:bg-gray-800">
            <ul class="space-y-2 font-medium" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <!-- dashboard -->
                <li role="presentation">
                    <a href="http://localhost/pencarian_pintar_lontar/pages/admin/DashboardAdmin.php" class="flex items-center p-2 text-gray-900 hover:text-mediumBlue rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="flex-shrink-0 w-5 h-5 text-orangePastel transition duration-75 dark:text-gray-400 group-hover:text-mediumBlue dark:group-hover:text-white fa-solid fa-home"></i>
                        <span class="ms-3 text-white font-montsMedium group-hover:text-mediumBlue ">Dashboard</span>
                    </a>
                </li>
                <!-- data lontar -->
                <li role="presentation">
                    <a href="http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="flex-shrink-0 w-5 h-5 text-orangePastel transition duration-75 dark:text-gray-400 group-hover:text-mediumBlue dark:group-hover:text-white fa-solid fa-book"></i>
                        <span class="ms-3 text-lightSecondary font-montsMedium group-hover:text-mediumBlue ">Data Lontar</span>
                    </a>
                </li>
            </ul>
            <ul class="space-y-2 font-medium" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <!-- dashboard -->
                <li role="presentation">
                    <a href="http://localhost/pencarian_pintar_lontar/apps/Logout.php" class="flex items-center p-2 text-gray-900 hover:text-mediumBlue rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="flex-shrink-0 w-5 h-5 text-orangePastel transition duration-75 dark:text-gray-400 group-hover:text-mediumBlue dark:group-hover:text-white fa-solid fa-sign-out"></i>
                        <span class="ms-3 text-white font-montsMedium group-hover:text-mediumBlue ">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <?php
    include "../../apps/DetailController.php";
    $result = $sparql->query($query);
    foreach ($result as $row) :
    ?>
        <div class="p-4 md:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-2xl dark:border-gray-700 mt-16">
                <div class=" w-xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="http://localhost/pencarian_pintar_lontar/pages/admin/TableDataLontar.php"><button class="mt-1 hover:bg-darkBlue px-5 py-2 text-white rounded-full bg-lightBlue hover:transition-all hover:delay-100"><i class="fa-solid fa-angle-left"></i> Kembali</button></a>
                    <!-- carousel image -->
                    <div id="default-carousel" class="relative w-full" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative xxsm:h-56 base:h-60 sm:h-72 md:h-[25rem] lg:h-96 overflow-hidden xl:h-[30rem] 2xl:h-[35rem]">
                            <?php foreach ($result as $row) : ?>
                                <figure class="image-container mt-5 cursor-pointer" data-carousel-item>
                                    <img class="w-full h-[700px] xxsm:rounded-t-xl" src="../../image_base/<?= $row->resource; ?>" alt="Lontar" />
                                </figure>
                            <?php endforeach; ?>
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute xxsm:hidden base:block top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute xxsm:hidden base:block  top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                    <!-- end carousel image -->
                    <div class="popup-image fixed top-0 left-0 bg-black z-50 w-full h-full  hidden">
                        <div class="close-popup-image flex justify-end p-5 cursor-pointer">
                            <i class="fa-solid fa-xmark text-white text-2xl hover:text-orangePastel"></i>
                        </div>
                        <div class="flex justify-center items-center bg-cover">
                            <img class="2xl:w-[1600px] 2xl:h-[730px] border-2 border-solid hover:scale-105  transition-all duration-700 border-white object-cover rounded-2xl" src="../../image_base/<?= $row->resource; ?>" alt="Lontar" />
                        </div>
                    </div>
                    <div class="mt-5">
                        <h5 class="mb-2 text-2xl font-montsBold tracking-tight text-darkBlue dark:text-white">Detail Data Lontar</h5>
                    </div>
                    <form class="w-xl mx-auto">

                        <div class="flex gap-4">
                            <div class="w-full">
                                <label for="disabled-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Lontar</label>
                                <input type="text" id="disabled-input" aria-label="disabled input" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->title; ?>" disabled>
                            </div>
                            <div class="w-full">
                                <label for="disabled-input-2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Lontar</label>
                                <input type="text" id="disabled-input-2" aria-label="disabled input-2" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->type; ?>" disabled>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-full">
                                <label for="disabled-input-3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                                <input type="text" id="disabled-input-3" aria-label="disabled input-3" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->author; ?>" disabled>
                            </div>
                            <div class="w-full">
                                <label for="disabled-input-4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subjek Lontar</label>
                                <input type="text" id="disabled-input-4" aria-label="disabled input-4" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->subject; ?>" disabled>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-full">
                                <label for="disabled-input-5" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klasifikasi Lontar</label>
                                <input type="text" id="disabled-input-5" aria-label="disabled input-3" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->classification; ?>" disabled>
                            </div>
                            <div class="w-full">
                                <label for="disabled-input-6" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bahasa Lontar</label>
                                <input type="text" id="disabled-input-6" aria-label="disabled input-3" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->language; ?>" disabled>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-full">
                                <label for="disabled-input-7" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Halaman Lontar</label>
                                <input type="text" id="disabled-input-7" aria-label="disabled input-3" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->collation; ?>" disabled>
                            </div>
                            <div class="w-full">
                                <label for="disabled-input-8" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                                <input type="text" id="disabled-input-8" aria-label="disabled input-3" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->year; ?>" disabled>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-full">
                                <label for="disabled-input-9" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Panjang Lontar </label>
                                <input type="text" id="disabled-input-9" aria-label="disabled input-3" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->length; ?> cm" disabled>
                            </div>
                            <div class="w-full">
                                <label for="disabled-input-10" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lebar Lontar</label>
                                <input type="text" id="disabled-input-10" aria-label="disabled input-3" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->width; ?> cm" disabled>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-full">
                                <label for="disabled-input-11" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Penyimpanan</label>
                                <input type="text" id="disabled-input-11" aria-label="disabled input-3" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->placename; ?>" disabled>
                            </div>
                            <div class="w-full">
                                <label for="disabled-input-11" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi Penyimpanan</label>
                                <input type="text" id="disabled-input-11" aria-label="disabled input-3" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->location; ?>" disabled>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-full">
                                <label for="disabled-input-11" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal Daerah</label>
                                <input type="text" id="disabled-input-11" aria-label="disabled input-3" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->area; ?>" disabled>
                            </div>
                            <div class="w-full">
                                <label for="disabled-input-11" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten/Kota</label>
                                <input type="text" id="disabled-input-11" aria-label="disabled input-3" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row->regency; ?>" disabled>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- script -->
    <script src="../../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script>
        document.querySelectorAll('.image-container img').forEach(image => {
            image.onclick = () => {
                document.querySelector('.popup-image').style.display = 'block';
                document.querySelector('.popup-image img').src = image.getAttribute('src');
            }
        })
        document.querySelector('.popup-image .close-popup-image').onclick = () => {
            document.querySelector('.popup-image').style.display = 'none';
        }
    </script>
</body>

</html>