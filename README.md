# Magento_ContactUs

This module is used to capture and store the Contact Us form details on Magento 2. To see the captured data on the Magento backend go to store > settings > configurations > General > Contacts > Contact Us > Set "Yes" to enable Contact Us followed by Set "Yes" to Display Contact Us Grid so the Contact Us menu will be visible under Marketing  > User Content Section.

__This Module Works with Magento default front end, REST API, GRAPH QL__

#### REST API Sample Payload

contactForm[name]                  Mohith<br>
contactForm[email]                 mohithdeveloper@gmail.com<br>
contactForm[telephone]             9876543211<br>
contactForm[comment]               SampleComment-From Rest Api<br>

### GRAPH QL Sample Payload

<html>
 <body>
<!-- HTML Code Start -->
<div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><pre style="margin: 0; line-height: 125%"> <span style="color: #FF0000; background-color: #FFAAAA">mutation</span> {
   <span style="color: #FF0000; background-color: #FFAAAA">contactus(</span>
     <span style="color: #FF0000; background-color: #FFAAAA">input:{</span>
        <span style="color: #FF0000; background-color: #FFAAAA">name:</span> <span style="color: #007700">&quot;Mohith&quot;</span>
        <span style="color: #FF0000; background-color: #FFAAAA">email</span>: <span style="background-color: #fff0f0">&quot;mohithdeveloper@gmail.com&quot;</span>
        <span style="color: #FF0000; background-color: #FFAAAA">telephone</span>: <span style="background-color: #fff0f0">&quot;9876543211&quot;</span>
        <span style="color: #FF0000; background-color: #FFAAAA">comment</span>: <span style="background-color: #fff0f0">&quot;SampleComment-From Graph QL&quot;</span>       
     }
   <span style="color: #FF0000; background-color: #FFAAAA">)</span>{
       <span style="color: #FF0000; background-color: #FFAAAA">msg</span>
   }
 <span style="color: #FF0000; background-color: #FFAAAA">}</span>
</pre></div>
<!-- HTML Code End -->
 </body>
</html>
To Know more about how to use this Modlue refer to: https://itsmoblogs.blogspot.com/2023/10/magento-2-contact-us-grid-restapi-graphql.html<br>


Thank you for using the module. Always happy to hear from you. The code improvements and module enhancements are appreciated. For any Magento 2 projects or Magento 2 freelancing, contact me at "mohithdeveloper@gmail.com".
