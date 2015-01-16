   
<div class="secondary-content">
                    <div class="col-container">
                        <?php echo '<h2 class="module-header">'.$custom_title.'</h2>'; ?>
                        <p>
                            Tell us a little bit about you, and we'll get in touch about becoming a member of Network Packaging Partners. We look forward to working with you. 
                        </p>
                        <div id="note" style="display:none;">Thank you for contacting us. We will be in touch soon!</div>
                        <form id="npp-become-a-partner" method="post">
                            <input type="hidden" name="p" value="<?php echo (plugin_dir_url( __FILE__ )); ?>">
                            <input type="hidden" name="e" value="<?php echo get_bloginfo('admin_email'); ?>">
                            
                            <div class="col-4">
                                <h3>Tell us about you:</h3>
                                <fieldset>
                                    <label>Your Name:</label>
                                    <input type="text" name="input-name" id="input-name" placeholder="Your name" required>
                                </fieldset>

                                <fieldset>
                                    <label>Email Address:</label>
                                    <input type="email" name="input-email" id="input-email" placeholder="Email address" required>
                                </fieldset>

                                <fieldset>
                                    <label>Additional Information:</label>
                                    <textarea name="textarea-additional-you" id="textarea-additional-you" placeholder="Additional information"></textarea>
                                </fieldset>
                            </div>

                            <div class="col-4">
                                <h3>Tell us about your company:</h3>
                                <fieldset>
                                    <label>Company Name:</label>
                                    <input type="text" name="company-name" id="company-name" placeholder="Company name" required>
                                </fieldset>

                                <fieldset>
                                    <label>Company URL:</label>
                                    <input type="text" name="company-url" id="company-url" placeholder="Company URL" required>
                                </fieldset>

                                <fieldset>
                                    <label>Additional Information:</label>
                                    <textarea name="textarea-additional-company" id="textarea-additional-company" placeholder="Additional information"></textarea>
                                </fieldset>
                            </div>

                            <div class="col-4">
                                <h3>Tell us when you'd like to chat:</h3>
                                <div id="date-picker">
                                    <input name="date-select" id="date-select" type="hidden">
                                </div>
                                <select name="select-times-interested" id="select-times-interested" required>
                                    <option selected value="null">Select a time...</option>
                                    <option value="9:00 am (EST)">9:00 am (EST)</option>
                                    <option value="10:00 am (EST)">10:00 am (EST)</option>
                                    <option value="11:00 am (EST)">11:00 am (EST)</option>
                                    <option value="12:00 pm (EST)">12:00 pm (EST)</option>
                                    <option value="1:00 pm (EST)">1:00 pm (EST)</option>
                                    <option value="2:00 pm (EST)">2:00 pm (EST)</option>
                                    <option value="3:00 pm (EST)">3:00 pm (EST)</option>
                                    <option value="4:00 pm (EST)">4:00 pm (EST)</option>
                                    <option value="5:00 pm (EST)">5:00 pm (EST)</option>
                                </select>
                            </div>

                            <fieldset class="btn-row">
                                <button type="submit" value="Search" id="btn-search" class="btn primary " name="btn-search"><span>Submit</span></button>
                            </fieldset>
                        </form>
                    </div>
                </div>