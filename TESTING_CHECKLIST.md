# Lead Capture Testing Checklist

## Step 1: Test Form Submission
- [ ] Go to https://www.inviteindia.com (or your local URL)
- [ ] Scroll to purple section: "Ready to create your wedding website?"
- [ ] Fill in:
  - Name: "Test Couple"
  - Email: your-test@email.com
  - Phone: 9876543210
  - Wedding Date: Any future date
- [ ] Click "Get My Wedding Website Free"
- [ ] Expected: Green success message appears

## Step 2: Check Database
- [ ] Open phpMyAdmin
- [ ] Select database: invitein_inviteall
- [ ] Click on email_leads table → Browse
- [ ] You should see 1 row with your test data
- [ ] Status should be: "new"
- [ ] created_at should be current timestamp

## Step 3: Check Email
- [ ] Check inbox for test-email@email.com
- [ ] Look for: "Welcome to InviteIndia - Your Wedding Website Awaits!"
- [ ] Email should contain:
  - Your name
  - List of features (WhatsApp, RSVP, domain, music)
  - "Create Your Wedding Website Free" button
  - InviteIndia branding

## Step 4: Check Redirect
- [ ] After form submission, you should be redirected to signup.php
- [ ] Should happen automatically after 2 seconds
- [ ] Or you can click the signup button in the thank you message

## Troubleshooting

### Form doesn't submit?
- Check browser console (F12 → Console tab)
- Look for JavaScript errors
- Check if save_lead.php exists

### Database row not appearing?
- Check if email_leads table was created
- Verify database connection in includes/configs/init.php
- Check file permissions on save_lead.php

### Email not received?
- Check spam/junk folder
- Verify email settings in save_lead.php
- Mail server might need configuration
- Can proceed without email - form still saves lead

### Redirect not happening?
- Check browser console for errors
- May be due to email sending delay
- Can manually navigate to signup.php

## Success Criteria ✅
- [ ] Form submits without errors
- [ ] Lead appears in database
- [ ] Email received (or at least lead saved)
- [ ] Redirect works

Once all checks pass, we move to Phase 2!
