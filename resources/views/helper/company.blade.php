@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{route('home')}}" class="text-decoration-none text-white">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div class="text-white">Company</div>
@endsection
@section('info')
    <a href="{{ route('userTutorial') }}" class="text-decoration-none text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white"
             class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
        </svg>
    </a>
@endsection

@section('content')
	<div class="let-com-banner">
		<div class="com-img-banner">
			<img src="https://neospide.techhelpinfotech.com/images/trading-sd.jpg" alt="">
		</div>
		<div class="com-let-content">
			<h3><img src="https://neospide.techhelpinfotech.com/images/mission.png" alt="icon"> Our Mission</h3>
			<p>At Shark Trades, our goal is to help you become a successful trader. We combine our expertise in high-frequency and algorithmic trading to stay ahead of market trends. By leveraging advanced data analytics, we provide insights that help you navigate the trading landscape with confidence.</p>
		</div>
		<div class="com-let-content">
			<h3><img src="https://neospide.techhelpinfotech.com/images/vision.png" alt="icon"> Our Vision</h3>
			<p>Shark Trades is committed to accountability  and transparency. We prioritize your best interests and make decisions based on careful research and analysis. Our aim is to build trust and long-term relationships with our clients, ensuring a reliable trading experience.</p>
		</div>
		<div class="com-let-content">
			<h3><img src="https://neospide.techhelpinfotech.com/images/values.png" alt="icon"> Our Values</h3>
			<p>We recognize that every trader has unique goals. That's why we offer customized solutions and continuous support to help you achieve your objectives. Our mission is to guide you, answer your questions, and equip you with the knowledge to make smart trading choices.</p>
		</div>
		<div class="let-trust-link">
			<a href="#">Trustpilot Rating <img src="https://neospide.techhelpinfotech.com/images/arrow.png" alt="icon"></a>
		</div>
		<div class="let-information">
			<h3>Contact Information</h3>
			<div class="let-main-info">
				<div class="let-info-box">
					<img src="https://neospide.techhelpinfotech.com/images/phone-s1.png" alt="social-media-icon"> 
					<p>Phone Number</p>
					<a href="#">+123-456-7890</a>
				</div>
				<div class="let-info-box">
					<img src="https://neospide.techhelpinfotech.com/images/mails-1.png" alt="social-media-icon"> 
					<p>Email</p>
					<a href="#">example@gmail.com</a>
				</div>
				<div class="let-info-box">
					<img src="https://neospide.techhelpinfotech.com/images/map-s1.png" alt="social-media-icon"> 
					<p>Address</p>
					<a href="#">Add Your Address Here</a>
				</div>
				<div class="let-info-box">
					<img src="https://neospide.techhelpinfotech.com/images/media-s.png" alt="social-media-icon"> 
					<p>Social Media</p>
					<ul>
						<li><a href="#"><img src="https://neospide.techhelpinfotech.com/images/instagram-s.png"></a></li>
						<li><a href="#"><img src="https://neospide.techhelpinfotech.com/images/facebook-s.png"></a></li>
						<li><a href="#"><img src="https://neospide.techhelpinfotech.com/images/twitter-s.png"></a></li>
						<li><a href="#"><img src="https://neospide.techhelpinfotech.com/images/whatsapp-s.png"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

    {{--<div class="img-background p-2">
        <div class="card-background mt-2  p-2 text-white bg-fade-dark">
            <div style="
                flex-grow: 2;
                text-align: center;
            ">
                <h5 style="line-height: 40px;" class="m-0 text-white"><i>United Kingdom</i></h5>
            </div>
            <p>
                We believe that trading is a craft to be honed, and we are here to assist you in your journey to mastery. Drawing upon our extensive experience in high-frequency and algorithmic trading, we consistently remain at the forefront of industry advancements, refining our strategies to seamlessly adapt to shifting market dynamics. By harnessing the power of data analysis and cutting-edge mathematical models, we uncover invaluable insights that illuminate your path in the world of trading.
            </p>
            <p>
                Our company is firmly built upon the principles of integrity and objectivity. Your interests are our utmost concern, and our decisions are grounded in meticulous research and comprehensive analysis. Trust is something that is cultivated over time, and we are resolutely committed to building enduring partnerships with our valued clients, delivering a transparent and reliable trading experience.
            </p>
            <p>
                We understand that each trader is unique, with their individual goals and aspirations. That's why we take a personalized approach, offering tailored solutions and steadfast support to meet your specific requirements. Our mission is to guide you, answer your questions, and empower you with the knowledge and confidence to make informed trading decisions."
            </p>
        </div>
    </div>--}}
@endsection
<style>
    .img-background {
        width: 100%;
        height: 90vh;
        background-image: url("{{ asset('/images/invite_background.png')}}");
    }

    .location-text {
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.49);
        color: black;
        width: 100px;
        border-radius: 25px;
        padding: 5px 0;
    }
</style>
