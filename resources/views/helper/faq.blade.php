@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{route('home')}}" class="text-decoration-none ">
        <span class="material-icons text-white">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div class="text-white">Frequently Asked Question</div>
@endsection

@section('content')
	<div class="let-faq-banner">
		<!--<img src="/images/faq-1.jpg" alt="banner-image">-->
	</div>
	<div class="let-custom-faq"> 
		<div class="accordion">
			<h3 class="let-heading-f">General Information</h3>
			<div class="accordion-item">
			  <button id="accordion-button-1" aria-expanded="false" class="active">
				<span class="accordion-title">What is Shark Trades?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content active">
				<p>
				 Shark Trades is an AI-powered cryptocurrency trading platform that connects with top digital currency exchanges. Using advanced algorithms and cloud-based data analysis, Shark Trades makes expert-level trading easy for everyone. Say goodbye to manual trading and hello to automation.
				</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-2" aria-expanded="false">
				<span class="accordion-title">How do I get started with Shark Trades?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				  Sign up on our website by creating an account. Verify your account, charge your wallet, and start trading using our simple and intuitive HFT platform.
				</p>
			  </div>
			</div>
			<h3 class="let-heading-f">Account Management</h3>
			<div class="accordion-item">
			  <button id="accordion-button-3" aria-expanded="false">
				<span class="accordion-title">How do I verify my account?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				  Follow the instructions in your email inbox to complete verification.
				</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-4" aria-expanded="false">
				<span class="accordion-title">How can I deposit and withdraw funds?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				  Go to the "Deposit" section in your dashboard to add funds. For withdrawals, visit the "Withdraw" section and follow the prompts. We support various cryptocurrencies payment methods.
				</p>
			  </div>
			</div>
			<h3 class="let-heading-f">Trading Information</h3>
			<div class="accordion-item">
			  <button id="accordion-button-5" aria-expanded="false">
				<span class="accordion-title">How do I place a trade?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				  Log in, purchase a subscription to our HFT robot, and select the timeframe you want to trade. Enter the amount and start the trade. Shark Trades uses high-frequency trading algorithms to perform well in both rising and falling markets across different exchanges.
				</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-5" aria-expanded="false">
				<span class="accordion-title">What trading tools and features are available?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				Shark Trades offers real-time charts, technical indicators, and automated trading options. These tools help you analyze the market and improve your trading strategy.
				</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-5" aria-expanded="false">
				<span class="accordion-title">What trading tools and features are available?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				Shark Trades offers an advanced HFT robot that performs trades autonomously using high-frequency trading strategies and various trading strategies. This robot analyzes the market in real-time, making quick and efficient trades to maximize returns without requiring manual input.
				</p>
			  </div>
			</div>
			<h3 class="let-heading-f">Security</h3>
			<div class="accordion-item">
			  <button id="accordion-button-5" aria-expanded="false">
				<span class="accordion-title">How does Shark Trades ensure the security of my funds?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				We use industry-standard security measures such as encryption, secure API interfaces, and cold storage for funds. Your assets stay in your account, and all transactions are secure.
				</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-5" aria-expanded="false">
				<span class="accordion-title">How do I set up Two-Factor Authentication (2FA)?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				Enable 2FA in your account settings. Use an authentication app like Google Authenticator to complete the setup.
				</p>
			  </div>
			</div>
			<h3 class="let-heading-f">Fees and Costs</h3>
			<div class="accordion-item">
			  <button id="accordion-button-5" aria-expanded="false">
				<span class="accordion-title">What fees does Shark Trades charge?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				We charge a 30% commission on your trading profits. For example, if you earn 100 USDT in profits, a 30 USDT commission will be deducted, leaving you with 65 USDT. A win-win situation.
				</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-5" aria-expanded="false">
				<span class="accordion-title">Are there any hidden costs?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				No, there are no hidden costs. All fees are clearly outlined in our fee structure available on our website. Additionally, withdrawal fees are as follows:
				•	$2 on TRC20
				•	$2 on ERC20
				•	$1 on BEP20
				</p>
			  </div>
			</div>
			<h3 class="let-heading-f">Technical Support</h3>
			<div class="accordion-item">
			  <button id="accordion-button-5" aria-expanded="false">
				<span class="accordion-title">What should I do if I encounter technical issues?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				Contact our customer support team for assistance.
				</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-5" aria-expanded="false">
				<span class="accordion-title">How can I contact customer support?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				Reach our customer support team via email at support@sharktrades.com or use the live chat feature on our website. Additionaly, you can reach out to your Studio Agent.
				</p>
			  </div>
			</div>
			<h3 class="let-heading-f">Educational Resources</h3>
			<div class="accordion-item">
			  <button id="accordion-button-5" aria-expanded="false">
				<span class="accordion-title">Where can I find trading guides and tutorials?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				Our platform offers a variety of trading guides, strategies, and tutorials to help you understand trading concepts. Visit our Telegram community group and channel to learn more.
				</p>
			  </div>
			</div>
			<h3 class="let-heading-f">Updates and Announcements</h3>
			<div class="accordion-item">
			  <button id="accordion-button-5" aria-expanded="false">
				<span class="accordion-title">Where can I find information about platform updates?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				We regularly post updates about new features, maintenance schedules, and other important information in our communiation channels.
				</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-5" aria-expanded="false">
				<span class="accordion-title">How can I stay informed about important news?</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content">
				<p>
				Follow us on social media channels to stay updated on the latest news and developments from Shark Trades.
				</p>
			  </div>
			</div>
		</div>
	</div>
	
  
@endsection
<style scoped>

    .card-background {
        border-radius: 8px !important;
        height: auto;
        transition: height 0.15s ease-out;
    }
    .border-bottom-faq {
        border-bottom: 1px solid #706d6d33;
    }
    .border-bottom-faq.clasic-enter{
     margin-right: -15px;
     margin-left: -15px;
    }
    .col-2{
        text-align: end;
    }
</style>
