# Magento_ContactUs

This module is used to capture and store the Contact Us form details on Magento 2. To see the captured data on the Magento backend go to store > settings > configurations > General > Contacts > Contact Us > Set "Yes" to enable Contact Us followed by Set "Yes" to Display Contact Us Grid so the Contact Us menu will be visible under Marketing  > User Content Section.

__This Module Works with Magento default front end, REST API, GRAPH QL__

#### REST API Sample Payload

contactForm[name]                  Mohith<br>
contactForm[email]                 mohithdeveloper@gmail.com<br>
contactForm[telephone]             9876543211<br>
contactForm[comment]               SampleComment-From Rest Api<br>

### GRAPH QL Sample Payload

 >mutation {<br>
   >>contactus(<br>
   >>>input:{<br>
    name: "Mohith"<br>
    email: "mohithdeveloper@gmail.com"<br>
    telephone: "9876543211"<br>
    comment: "SampleComment-From Graph QL"      
     }<br>
   >>){<br>
       msg<br>
   >>}<br>
 >}
 
Thank you for using the module. Always happy to hear from you. The code improvements and module enhancements are appreciated. For any Magento 2 projects or Magento 2 freelancing, contact me at "mohithdeveloper@gmail.com".
