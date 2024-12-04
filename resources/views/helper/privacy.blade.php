@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('user-menu') }}" class="text-decoration-none text-white">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div class="text-white">Privacy Policy</div>
@endsection

@section('content')
   
   <div class="let-faq-banner privacy-banner">
		<!--<img src="/images/faq-1.jpg" alt="banner-image">-->
	</div>
	<div class="let-custom-faq"> 
		<h3 class="let-heading-f">Privacy Policy</h3>
		<p>Welcome to Shark Trades Financial Services Ltd ("Shark Trades," "we," "us," or "our"). We value your privacy and want you to understand how we handle your information. This Privacy Policy explains what data we collect, why we collect it, and how we protect it.</p>
		<div class="accordion">
			<div class="accordion-item">
			  <button id="accordion-button-1" aria-expanded="false" class="active">
				<span class="accordion-title">I. Information We Collect</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content active">
				<h5>a) Personal Information	</h5>
				<p>We collect information you provide when using our services. This may include your name, contact details, and financial information if applicable.</p>
				<h5>b) Usage Data</h5>
				<p>We automatically collect data when you use our services, such as your device's IP address, browser type, and how you interact with our platform.</p>
				<h5>c) Cookies and Tracking Technologies	</h5>
				<p>We use cookies and similar tracking technologies to enhance your experience on our platform, analyze usage, and assist in our marketing efforts. You can manage your cookie preferences through your browser settings.</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-1" aria-expanded="false" class="">
				<span class="accordion-title">II. How We Use Your Information</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content ">
				<p>We use your information for the following purposes:</p>
				<h5>a) Providing Services</h5>
				<p>To offer you our financial services and ensure they work smoothly.</p>
				<h5>b) Communication</h5>
				<p>To keep you informed about service updates and important information.</p>
				<h5>c) Improving Services</h5>
				<p>To enhance our services, identify issues, and make them better for you.</p>
				<h5>d) Personalization</h5>
				<p>To personalize your experience on our platform and provide tailored recommendations.</p>
				<h5>e) Security</h5>
				<p>To protect our platform and users from fraudulent activity and ensure the safety of your data.</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-1" aria-expanded="false" class="">
				<span class="accordion-title">III. Information Sharing</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content ">
				<p>We may share your information under certain circumstances:</p>
				<h5>a) Service Providers</h5>
				<p>With trusted service providers who help us deliver our services.</p>
				<h5>b) Legal Obligations</h5>
				<p>To comply with legal obligations, such as responding to legal requests or protecting our rights.</p>
				<h5>c) Business Transfers</h5>
				<p>In the event of a business merger, acquisition, or sale of assets, your information may be transferred.</p>
				<h5>d) Affiliates</h5>
				<p>With our affiliates to support our services and operations.</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-1" aria-expanded="false" class="">
				<span class="accordion-title">IV. Your Choices</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content ">
				<p>You have control over your personal information:</p>
				<h5>a) Access</h5>
				<p>You can access, update, or delete your information by logging into your account.</p>
				<h5>b) Consent</h5>
				<p>We will obtain your consent for certain data uses.</p>
				<h5>c) Opt-out</h5>
				<p>You can opt out of receiving non-essential communications.</p>
				<h5>d) Cookie Preferences</h5>
				<p>You can manage your cookie preferences through your browser settings.</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-1" aria-expanded="false" class="">
				<span class="accordion-title">V. Data Security</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content ">
				<p>We take data security seriously and employ measures to protect your information. However, no method of data transmission is entirely secure. Our measures include:
				•	Encryption: Protecting data during transmission and storage.
				•	Access Controls: Restricting access to your information to authorized personnel only.
				•	Regular Audits: Conducting regular security audits to identify and mitigate risks.
				</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-1" aria-expanded="false" class="">
				<span class="accordion-title">VI. Data Retention</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content ">
				<p>We retain your personal information only as long as necessary to fulfill the purposes outlined in this Privacy Policy, comply with legal obligations, resolve disputes, and enforce our policies.
				</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-1" aria-expanded="false" class="">
				<span class="accordion-title">VII. Children's Privacy</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content ">
				<p>
				Our services are not for users under 18. We do not knowingly collect their personal information.
				</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-1" aria-expanded="false" class="">
				<span class="accordion-title">VIII. International Data Transfers</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content ">
				<p>
				Your information may be transferred to and maintained on servers located outside of your jurisdiction, where data protection laws may differ. We take steps to ensure your data is protected according to this Privacy Policy.
				</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-1" aria-expanded="false" class="">
				<span class="accordion-title">IX. Changes to this Policy</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content ">
				<p>
				We may update this Privacy Policy. We'll notify you of changes, and the latest version will be posted on our website. Please review it periodically.
				</p>
			  </div>
			</div>
			<div class="accordion-item">
			  <button id="accordion-button-1" aria-expanded="false" class="">
				<span class="accordion-title">X. Contact Us</span>
				<span class="icon" aria-hidden="true"></span>
			  </button>
			  <div class="accordion-content ">
				<p>
				If you have questions or concerns about this Privacy Policy, please contact us at support@sharktrades.com.
				</p>
			  </div>
			</div>
		</div>
	</div>

@endsection

