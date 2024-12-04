<template>
    <div class="background-i">
        <div class="card-background m-4">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12">
                    <div class=" p-2" style="border-radius: 15px">
                        <div class="text-center">
                            <div class="d-flex justify-content-between align-items-center align-content-center p-2">
                                <div class="d-flex tracking-in-expand align-items-center gap-1">
                                    <div class="user-letters">
                                        {{ user_data.name.toUpperCase().charAt(0) }}
                                    </div>
                                    <h2 class="mx-2 text-white" style="line-height: 40px; font-size: 1.1rem">
                                        {{ user_data.name.toLowerCase() }}</h2>
                                </div>
                            </div>
                            <div
                                class="d-flex flex-wrap  align-items-center align-content-center text-center w-100 mt-2 mb-3"
                                style="gap:2px;">
                                <div class="d-flex justify-content-between align-items-center flex-column gap-2 p-1"
                                     style="background-color:#424242;flex:1 1 0%;">
                                    <a href="/deposit"
                                       class="col d-flex gap-1 text-decoration-none  justify-content-between flex-column align-items-center">
                                        <!--                                        <img class="wallet-icons" src="/storage/images/attachments/deposit.png" alt="company">-->

                                        <div class="text-white">Deposit</div>
                                        <div class="wallet-icons">
<!--                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"
                                                 class="w-6 h-6">
                                                <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z"/>
                                                <path fill-rule="evenodd"
                                                      d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"
                                                      clip-rule="evenodd"/>
                                            </svg>-->
                                            <img src="/images/deposit2.png" width="30px" alt="deposit">
                                        </div>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-column gap-2 p-1"
                                     style="background-color:#424242;flex:1 1 0%;">
                                    <a href="/withdraw"
                                       class="col d-flex gap-1 text-decoration-none  justify-content-between flex-column align-items-center">

                                        <!--                                        <img class="wallet-icons" src="/storage/images/attachments/withdraw.png" alt="withdraw">-->
                                        <div class="text-white">Withdraw</div>
                                        <div class="wallet-icons">
<!--                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"
                                                 class="w-6 h-6">
                                                <path fill-rule="evenodd"
                                                      d="M10.5 3.75a6 6 0 00-5.98 6.496A5.25 5.25 0 006.75 20.25H18a4.5 4.5 0 002.206-8.423 3.75 3.75 0 00-4.133-4.303A6.001 6.001 0 0010.5 3.75zm2.25 6a.75.75 0 00-1.5 0v4.94l-1.72-1.72a.75.75 0 00-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 10-1.06-1.06l-1.72 1.72V9.75z"
                                                      clip-rule="evenodd"/>
                                            </svg>-->
                                            <img src="/images/withdrawal.png" width="30px" alt="withdrawal">

                                        </div>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-column gap-2 p-1"
                                     style="background-color:#424242;flex:1 1 0%;">
                                    <a href="/transfer"
                                       class="col d-flex gap-1 justify-content-between text-decoration-none  flex-column align-items-center">

                                        <!--                                        <img class="wallet-icons" src="/storage/images/attachments/transfer.png" alt="company">-->
                                        <div class="text-white">Transfer</div>
                                        <div class="wallet-icons">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"
                                                 class="w-6 h-6">
                                                <path fill-rule="evenodd"
                                                      d="M15.97 2.47a.75.75 0 011.06 0l4.5 4.5a.75.75 0 010 1.06l-4.5 4.5a.75.75 0 11-1.06-1.06l3.22-3.22H7.5a.75.75 0 010-1.5h11.69l-3.22-3.22a.75.75 0 010-1.06zm-7.94 9a.75.75 0 010 1.06l-3.22 3.22H16.5a.75.75 0 010 1.5H4.81l3.22 3.22a.75.75 0 11-1.06 1.06l-4.5-4.5a.75.75 0 010-1.06l4.5-4.5a.75.75 0 011.06 0z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-background-1 user-menus d-flex justify-content-between flex-column px-2 mt-2 gap-1">
            <a href="/my-profile" class="button-14" role="button">
                <div class="text row">
                    <div class="col-2">
                        <div class="wallet-icons">
                            <img src="/images/user.png" alt="user profile" width="20">
                        </div>
                    </div>
                    <div class="col-8">My Profile</div>
                    <div class="col-2">
                        <div class="arrow-next">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                      d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                      clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                <span class="button-14-background blue"></span>
                <span class="button-14-border"></span>

                <!-- mask-border fallback -->
                <svg style="position: absolute;" width="0" height="0">
                    <filter id="remove-black-button-14" color-interpolation-filters="sRGB">
                        <feColorMatrix type="matrix" values="1 0 0 0 0
0 1 0 0 0
0 0 1 0 0
-1 -1 -1 0 1" result="black-pixels"></feColorMatrix>
                        <feComposite in="SourceGraphic" in2="black-pixels" operator="out"></feComposite>
                    </filter>
                </svg>
            </a>
            <a href="/my-profile" class="row p-2 align-items-center  text-decoration-none border-bottom-menu ">
                <div class="col-2">
                    <div class="wallet-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>                    </div>
                </div>
                <div class="col-8">My Profile</div>
                <div class="col-2">
                    <div class="arrow-next">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                  d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                  clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </a>



            <a href="/my-wallet" class="row p-2 align-items-center  text-decoration-none border-bottom-menu">
                <div class="col-2">
                    <div class="wallet-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3"/>
                        </svg>
                    </div>
                </div>
                <div class="col-8 d-flex gap-1  justify-content-between">My Wallet
                    <div class="d-flex">
                        {{ wallet_data && wallet_data.amount }}
                        <img style="width: 15px; height:auto" src="/images/Tether-USDT-icon.webp" alt="coin"/>
                    </div>
                </div>
                <div class="col-2">
                    <div class="arrow-next">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                  d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </a>
            <a href="/my-team" class="row p-2 align-items-center  text-decoration-none border-bottom-menu">
                <div class="col-2">
                    <div class="wallet-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="col-8">My team</div>
                <div class="col-2">
                    <div class="arrow-next">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                  d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </a>
            <a href="/change-password" class="row p-2 align-items-center  text-decoration-none border-bottom-menu">
                <div class="col-2">
                    <div class="wallet-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"/>
                        </svg>
                    </div>
                </div>
                <div class="col-8">Change Password</div>
                <div class="col-2">
                    <div class="arrow-next">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                  d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </a>
            <a href="/payment-password" class="row p-2 align-items-center  text-decoration-none border-bottom-menu">
                <div class="col-2">
                    <div class="wallet-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                  d="M12 3.75a6.715 6.715 0 00-3.722 1.118.75.75 0 11-.828-1.25 8.25 8.25 0 0112.8 6.883c0 3.014-.574 5.897-1.62 8.543a.75.75 0 01-1.395-.551A21.69 21.69 0 0018.75 10.5 6.75 6.75 0 0012 3.75zM6.157 5.739a.75.75 0 01.21 1.04A6.715 6.715 0 005.25 10.5c0 1.613-.463 3.12-1.265 4.393a.75.75 0 01-1.27-.8A6.715 6.715 0 003.75 10.5c0-1.68.503-3.246 1.367-4.55a.75.75 0 011.04-.211zM12 7.5a3 3 0 00-3 3c0 3.1-1.176 5.927-3.105 8.056a.75.75 0 11-1.112-1.008A10.459 10.459 0 007.5 10.5a4.5 4.5 0 119 0c0 .547-.022 1.09-.067 1.626a.75.75 0 01-1.495-.123c.041-.495.062-.996.062-1.503a3 3 0 00-3-3zm0 2.25a.75.75 0 01.75.75A15.69 15.69 0 018.97 20.738a.75.75 0 01-1.14-.975A14.19 14.19 0 0011.25 10.5a.75.75 0 01.75-.75zm3.239 5.183a.75.75 0 01.515.927 19.415 19.415 0 01-2.585 5.544.75.75 0 11-1.243-.84 17.912 17.912 0 002.386-5.116.75.75 0 01.927-.515z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="col-8">Payment Password</div>
                <div class="col-2">
                    <div class="arrow-next">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                  d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </a>
            <a href="/setup-2fa" class="row p-2 align-items-center  text-decoration-none border-bottom-menu">
                <div class="col-2">
                    <div class="wallet-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 444 512.36"><path d="M75.33 320.47h294.33c29.56-56.91 43.93-129.92 39.5-219.58-53.23 4.86-119.13-19.6-187.78-63.12-54.92 42.67-118.12 63.87-187.08 60.26-2.43 92.68 12.43 166.09 41.03 222.44zm328.53.58c14.79 2.87 26.06 16 26.06 31.53v127.66c0 17.59-14.52 32.12-32.12 32.12H46.18c-17.59 0-32.11-14.46-32.11-32.12V352.58c0-15.96 11.87-29.43 27.32-31.75C12.17 255.78-2.41 172.49.33 67.99 75.67 71.94 149.6 55.65 221.23 0 304.03 52.48 378.81 77.3 443 71.44c5.01 101.3-8.95 184.06-39.14 249.61zM161.67 177.27h6.01v-13.91c0-15.4 6.07-29.44 15.84-39.64 9.87-10.28 23.48-16.66 38.48-16.66 14.99 0 28.62 6.38 38.47 16.66 9.78 10.2 15.85 24.23 15.85 39.64v13.91h6c4.88 0 8.87 3.99 8.87 8.86v93.66c0 4.88-3.99 8.87-8.87 8.87H161.67c-4.88 0-8.86-3.99-8.86-8.87v-93.66c-.01-4.87 3.98-8.86 8.86-8.86zm22.78 0h75.09v-13.91c0-10.96-4.27-20.88-11.14-28.04-6.79-7.09-16.14-11.48-26.41-11.48-10.26 0-19.62 4.39-26.4 11.48-6.88 7.16-11.14 17.08-11.14 28.04v13.91zm30.27 59.82-9.56 25.05h33.68l-8.86-25.4c5.62-2.89 9.47-8.75 9.47-15.51 0-9.64-7.81-17.45-17.46-17.45-9.63 0-17.44 7.81-17.44 17.45 0 7.03 4.17 13.1 10.17 15.86zM105.2 397.93l-3.62-20.7c11.68-3.52 23.3-5.28 34.89-5.28 4.63 0 8.49.13 11.6.41 3.1.28 6.32.97 9.66 2.08 3.33 1.12 5.97 2.64 7.91 4.59 4.46 4.44 6.68 11.26 6.68 20.43s-2.6 15.93-7.79 20.29c-5.18 4.35-16.12 9.35-32.79 15v3.9h39.18v22.23H99.64v-17.37c0-5.19.97-10.14 2.91-14.87 1.21-2.69 4.13-5.93 8.76-9.73 2.5-2.13 5.86-4.17 10.07-6.11 4.22-1.95 8.2-3.78 11.96-5.49 3.75-1.71 6.78-3.13 9.1-4.24v-7.5c-4.17-.46-8.02-.7-11.54-.7-8.52 0-17.09 1.02-25.7 3.06zm140.7 33.06h-23.62v29.89h-27.8v-86.86h56.98l-3.48 22.25h-25.7v14.01h23.62v20.71zm38.64 29.89h-28.15l22.52-86.86h42.94l22.51 86.86h-28.15l-3.2-13.75h-25.27l-3.2 13.75zm12.13-60.17-3.93 24.32h15.13l-3.8-24.32h-7.4z"/></svg>
                    </div>
                </div>
                <div class="col-8">
                    Setup Google 2FA
<!--                    <div class="text-danger">
                        If you click this link your previous code will be expired.
                    </div>-->
                </div>
                <div class="col-2">
                    <div class="arrow-next">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                  d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </a>
            <div class="last-menu-elem">
                <!--            <a href="https://t.me/FalconAssistanBot"-->
                <a href="https://t.me/eternity_support_bot"
                   class="row p-2 align-items-center  text-decoration-none">
                    <div class="col-2">
                        <div class="wallet-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col-8">Telegram</div>
                    <div class="col-2">
                        <div class="arrow-next">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                 class="w-6 h-6">
                                <path fill-rule="evenodd"
                                      d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </a>
                <a href="/media-related" class="row p-2 align-items-center  text-decoration-none ">
                    <div class="col-2">
                        <div class="wallet-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col-8">Media Related</div>
                    <div class="col-2">
                        <div class="arrow-next">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                 class="w-6 h-6">
                                <path fill-rule="evenodd"
                                      d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </a>
                <a href="/privacy-policy" class="row p-2 align-items-center  text-decoration-none ">
                    <div class="col-2">
                        <div class="wallet-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col-8">Privacy Policy</div>
                    <div class="col-2">
                        <div class="arrow-next">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                 class="w-6 h-6">
                                <path fill-rule="evenodd"
                                      d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>


        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "UserMenu",
    data() {
        return {
            user_data: JSON.parse(this.user),
            wallet_data: JSON.parse(this.wallet),
        };
    },
    methods: {
        logout() {
            axios.post("/logout");
        },
    },
    props: ["user", "wallet"],
    created() {
    },
};
</script>

<style scoped>

.user-letters {
    font-family: "Khalid", helvetica, serif;
    font-size: 70px;
    color: #bbb;
    background: #eee;
    text-align: center;
    line-height: 80px;
    width: 80px;
    height: 80px;
    margin: 0;
    border-radius: 100%;
}

.tracking-in-expand {
    -webkit-animation: tracking-in-expand 0.7s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
    animation: tracking-in-expand 0.7s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
}

@-webkit-keyframes tracking-in-expand {
    0% {
        letter-spacing: -0.5em;
        opacity: 0;
    }
    40% {
        opacity: 0.6;
    }
    100% {
        opacity: 1;
    }
}

.user-menus:nth-last-child(-n+3) {
    gap: 0 !important;
}

@keyframes tracking-in-expand {
    0% {
        letter-spacing: -0.5em;
        opacity: 0;
    }
    40% {
        opacity: 0.6;
    }
    100% {
        opacity: 1;
    }
}


.balance {
    top: 0;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    height: 100vh;
    display: grid;
    place-content: center;
    background-color: #1d1e22;
}

.box {
    position: relative;
    margin: 0 auto;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: linear-gradient(45deg, transparent, transparent 40%, #f65208),
    linear-gradient(#262626, #141414);
    animation: rotate 2s linear infinite;
}

.box:before,
.box:after {
    content: " ";
    position: absolute;
    inset: 5px;
    background: linear-gradient(#161616, #262626);
    border-radius: inherit;
}

.box:before {
    background: linear-gradient(45deg, transparent, transparent 40%, #f65208);
    filter: blur(32px);
}

@keyframes rotate {
    100% {
        transform: rotate(360deg);
        filter: hue-rotate(360deg);
    }
}

.user-logo {
    font-size: 30px;
    position: absolute;
    top: 30%;
    left: 47%;
}

.wallet-icons {
    width: 35px;
    border-radius: 15px;
    padding: 5px;
}

.arrow-next {
    width: 20px;
    float: right;
}

.card-background-1 {
    background: none;
}

.border-bottom-menu {
    background: #424242;
    border: 1px solid gray;
    margin-bottom: 1rem;
    border-radius: 5px;
    color: #fff;
}

.background-i {
    background-image: url("/storage/images/bac-menu.jpeg");
    width: 100%;
}

.last-menu-elem {
    background: #424242;
    border-radius: 5px;
}

.last-menu-elem a:first-child,
.last-menu-elem a:nth-child(2) {
    border-bottom: 1px solid gray;
}

.last-menu-elem a {
    color: white;
}
</style>
