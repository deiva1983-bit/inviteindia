/**
 * Wedding Invitation Customizer Engine
 *
 * File: static/js/wedding-invitation-builder.js
 * Description: Interactive React-powered builder for wedding invitations with real-time preview,
 *              theme selection, customization options, and sharing features
 *
 * Features:
 * - Theme gallery with preview
 * - Wedding details editor (names, venue, date, time)
 * - Font and color customization
 * - Feature toggles (countdown, maps, WhatsApp RSVP, music)
 * - Dual-mode live preview (mobile & desktop)
 * - WhatsApp share generation
 * - No external dependencies (vanilla JS + CSS Grid/Flexbox)
 */

(function(window) {
    'use strict';

    // ============================================================================
    // THEME DEFINITIONS
    // ============================================================================
    const INVITATION_THEMES = {
        classic: {
            id: 'classic',
            name: 'Classic Elegance',
            thumbnail: '/static/images/themes/classic-thumb.jpg',
            bgColor: '#f5f5f5',
            accentColor: '#d43f5e',
            fontFamily: 'serif',
            description: 'Traditional and timeless wedding invitation'
        },
        modern: {
            id: 'modern',
            name: 'Modern Minimal',
            thumbnail: '/static/images/themes/modern-thumb.jpg',
            bgColor: '#ffffff',
            accentColor: '#2c3e50',
            fontFamily: 'sans-serif',
            description: 'Clean and contemporary design'
        },
        floral: {
            id: 'floral',
            name: 'Floral Romance',
            thumbnail: '/static/images/themes/floral-thumb.jpg',
            bgColor: '#fef5f1',
            accentColor: '#e8547d',
            fontFamily: 'cursive',
            description: 'Beautiful floral-inspired theme'
        },
        gold: {
            id: 'gold',
            name: 'Gold Celebration',
            thumbnail: '/static/images/themes/gold-thumb.jpg',
            bgColor: '#fef9e7',
            accentColor: '#d4af37',
            fontFamily: 'serif',
            description: 'Luxurious and festive gold theme'
        },
        boho: {
            id: 'boho',
            name: 'Bohemian Chic',
            thumbnail: '/static/images/themes/boho-thumb.jpg',
            bgColor: '#f4e4c1',
            accentColor: '#8b4513',
            fontFamily: 'cursive',
            description: 'Eclectic and artistic design'
        }
    };

    // ============================================================================
    // DEFAULT INVITATION DATA
    // ============================================================================
    const DEFAULT_INVITATION = {
        theme: 'classic',
        couple: {
            bride: 'Bride Name',
            groom: 'Groom Name'
        },
        event: {
            date: new Date(2025, 11, 20), // Dec 20, 2025
            time: '18:00',
            venue: 'Palace Hotel, Mumbai',
            city: 'Mumbai',
            state: 'Maharashtra'
        },
        customization: {
            primaryFont: 'Open Sans',
            accentFont: 'Great Vibes',
            headingSize: 48,
            bodySize: 16,
            primaryColor: '#d43f5e',
            secondaryColor: '#f44c5a'
        },
        features: {
            countdown: true,
            googleMaps: true,
            whatsappRsvp: true,
            backgroundMusic: false
        }
    };

    // ============================================================================
    // MAIN BUILDER CLASS
    // ============================================================================
    class WeddingInvitationBuilder {
        constructor(containerId) {
            this.container = document.getElementById(containerId);
            if (!this.container) {
                console.error('Container element not found:', containerId);
                return;
            }

            this.data = JSON.parse(JSON.stringify(DEFAULT_INVITATION));
            this.previewMode = 'desktop'; // 'mobile' or 'desktop'
            this.init();
        }

        init() {
            this.render();
            this.setupEventListeners();
            this.updatePreview();
        }

        // ====================================================================
        // RENDERING
        // ====================================================================
        render() {
            this.container.innerHTML = this.buildHTML();
            this.applyStyles();
        }

        buildHTML() {
            return `
                <div class="wedding-builder-wrapper">
                    <!-- Left Sidebar: Theme & Options -->
                    <div class="builder-sidebar">
                        ${this.buildThemeGallery()}
                        ${this.buildDetailsEditor()}
                        ${this.buildCustomizationPanel()}
                        ${this.buildFeaturesToggle()}
                    </div>

                    <!-- Right Panel: Live Preview -->
                    <div class="builder-preview-section">
                        ${this.buildPreviewControls()}
                        <div class="preview-container" id="previewContainer">
                            ${this.buildInvitationPreview()}
                        </div>
                        ${this.buildShareActions()}
                    </div>
                </div>
            `;
        }

        buildThemeGallery() {
            const themes = Object.values(INVITATION_THEMES)
                .map(theme => `
                    <div class="theme-card ${this.data.theme === theme.id ? 'active' : ''}"
                         data-theme-id="${theme.id}"
                         style="border-color: ${theme.accentColor}">
                        <img src="${theme.thumbnail}" alt="${theme.name}" class="theme-thumbnail">
                        <h4>${theme.name}</h4>
                        <p class="theme-desc">${theme.description}</p>
                    </div>
                `)
                .join('');

            return `
                <section class="builder-section">
                    <h3><i class="fa fa-palette"></i> Select Theme</h3>
                    <div class="theme-gallery">
                        ${themes}
                    </div>
                </section>
            `;
        }

        buildDetailsEditor() {
            const { bride, groom } = this.data.couple;
            const { date, time, venue, city, state } = this.data.event;

            return `
                <section class="builder-section">
                    <h3><i class="fa fa-heart"></i> Wedding Details</h3>

                    <div class="form-group">
                        <label>Bride's Name</label>
                        <input type="text" class="form-control" id="brideName"
                               value="${bride}" placeholder="Enter bride's name">
                    </div>

                    <div class="form-group">
                        <label>Groom's Name</label>
                        <input type="text" class="form-control" id="groomName"
                               value="${groom}" placeholder="Enter groom's name">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>Wedding Date</label>
                            <input type="date" class="form-control" id="eventDate"
                                   value="${this.formatDateForInput(date)}">
                        </div>
                        <div class="form-group col-6">
                            <label>Time</label>
                            <input type="time" class="form-control" id="eventTime"
                                   value="${time}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Venue / Hall Name</label>
                        <input type="text" class="form-control" id="venue"
                               value="${venue}" placeholder="Enter venue name">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>City</label>
                            <input type="text" class="form-control" id="city"
                                   value="${city}" placeholder="City">
                        </div>
                        <div class="form-group col-6">
                            <label>State</label>
                            <input type="text" class="form-control" id="state"
                                   value="${state}" placeholder="State">
                        </div>
                    </div>
                </section>
            `;
        }

        buildCustomizationPanel() {
            const { primaryFont, accentFont, headingSize, bodySize, primaryColor, secondaryColor } = this.data.customization;

            return `
                <section class="builder-section">
                    <h3><i class="fa fa-paint-brush"></i> Customize Design</h3>

                    <div class="form-group">
                        <label>Heading Font</label>
                        <select class="form-control" id="accentFont">
                            <option value="Great Vibes" ${accentFont === 'Great Vibes' ? 'selected' : ''}>Great Vibes</option>
                            <option value="Poiret One" ${accentFont === 'Poiret One' ? 'selected' : ''}>Poiret One</option>
                            <option value="Georgia" ${accentFont === 'Georgia' ? 'selected' : ''}>Georgia</option>
                            <option value="Courier New" ${accentFont === 'Courier New' ? 'selected' : ''}>Courier New</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Body Font</label>
                        <select class="form-control" id="primaryFont">
                            <option value="Open Sans" ${primaryFont === 'Open Sans' ? 'selected' : ''}>Open Sans</option>
                            <option value="Montserrat" ${primaryFont === 'Montserrat' ? 'selected' : ''}>Montserrat</option>
                            <option value="Lato" ${primaryFont === 'Lato' ? 'selected' : ''}>Lato</option>
                            <option value="Raleway" ${primaryFont === 'Raleway' ? 'selected' : ''}>Raleway</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Heading Size: <span id="headingSizeValue">${headingSize}px</span></label>
                        <input type="range" class="form-control-range" id="headingSize"
                               min="32" max="72" value="${headingSize}" step="2">
                    </div>

                    <div class="form-group">
                        <label>Body Size: <span id="bodySizeValue">${bodySize}px</span></label>
                        <input type="range" class="form-control-range" id="bodySize"
                               min="12" max="24" value="${bodySize}" step="1">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>Primary Color</label>
                            <input type="color" class="form-control form-control-color" id="primaryColor"
                                   value="${primaryColor}">
                        </div>
                        <div class="form-group col-6">
                            <label>Secondary Color</label>
                            <input type="color" class="form-control form-control-color" id="secondaryColor"
                                   value="${secondaryColor}">
                        </div>
                    </div>
                </section>
            `;
        }

        buildFeaturesToggle() {
            const { countdown, googleMaps, whatsappRsvp, backgroundMusic } = this.data.features;

            return `
                <section class="builder-section">
                    <h3><i class="fa fa-star"></i> Features</h3>

                    <div class="feature-toggle">
                        <label>
                            <input type="checkbox" id="featureCountdown" ${countdown ? 'checked' : ''}>
                            <span><i class="fa fa-clock-o"></i> Countdown Timer</span>
                        </label>
                    </div>

                    <div class="feature-toggle">
                        <label>
                            <input type="checkbox" id="featureGoogleMaps" ${googleMaps ? 'checked' : ''}>
                            <span><i class="fa fa-map-marker"></i> Google Maps Button</span>
                        </label>
                    </div>

                    <div class="feature-toggle">
                        <label>
                            <input type="checkbox" id="featureWhatsapp" ${whatsappRsvp ? 'checked' : ''}>
                            <span><i class="fa fa-whatsapp"></i> WhatsApp RSVP</span>
                        </label>
                    </div>

                    <div class="feature-toggle">
                        <label>
                            <input type="checkbox" id="featureMusic" ${backgroundMusic ? 'checked' : ''}>
                            <span><i class="fa fa-music"></i> Background Music</span>
                        </label>
                    </div>
                </section>
            `;
        }

        buildPreviewControls() {
            return `
                <div class="preview-controls">
                    <div class="preview-mode-toggle">
                        <button class="preview-btn ${this.previewMode === 'desktop' ? 'active' : ''}"
                                data-mode="desktop">
                            <i class="fa fa-desktop"></i> Desktop
                        </button>
                        <button class="preview-btn ${this.previewMode === 'mobile' ? 'active' : ''}"
                                data-mode="mobile">
                            <i class="fa fa-mobile"></i> Mobile
                        </button>
                    </div>
                    <div class="preview-title">Live Preview</div>
                </div>
            `;
        }

        buildInvitationPreview() {
            const { bride, groom } = this.data.couple;
            const { date, time, venue, city, state } = this.data.event;
            const { primaryFont, accentFont, primaryColor, secondaryColor } = this.data.customization;
            const { countdown, googleMaps, whatsappRsvp } = this.data.features;
            const theme = INVITATION_THEMES[this.data.theme];

            const formattedDate = this.formatDateDisplay(date);
            const formattedTime = this.formatTime(time);

            let previewHTML = `
                <div class="invitation-preview ${this.previewMode === 'mobile' ? 'mobile-view' : 'desktop-view'}"
                     style="
                        background-color: ${theme.bgColor};
                        color: ${primaryColor};
                        font-family: ${primaryFont}, sans-serif;
                     ">

                    <div class="invitation-header" style="border-bottom: 3px solid ${primaryColor};">
                        <h1 class="couple-names" style="
                            font-family: ${accentFont}, cursive;
                            color: ${primaryColor};
                            font-size: ${this.data.customization.headingSize}px;
                        ">
                            ${bride} & ${groom}
                        </h1>
                        <p class="invitation-subtitle" style="color: ${secondaryColor};">
                            Request the honor of your presence
                        </p>
                    </div>

                    <div class="invitation-content" style="padding: 30px;">
                        <div class="event-date-time" style="text-align: center; margin: 20px 0;">
                            <p style="font-size: 18px; color: ${primaryColor};">
                                <strong>${formattedDate}</strong>
                            </p>
                            <p style="font-size: 16px; color: ${secondaryColor};">
                                At ${formattedTime}
                            </p>
                        </div>

                        <div class="event-venue" style="
                            background: rgba(0,0,0,0.05);
                            padding: 20px;
                            border-radius: 8px;
                            margin: 20px 0;
                            text-align: center;
                        ">
                            <p style="font-size: 14px; margin: 0;"><strong>Venue</strong></p>
                            <p style="font-size: 16px; margin: 8px 0; color: ${primaryColor};">
                                ${venue}
                            </p>
                            <p style="font-size: 13px; color: ${secondaryColor};">
                                ${city}, ${state}
                            </p>
                        </div>
            `;

            if (countdown) {
                previewHTML += `
                    <div class="countdown-section" style="
                        text-align: center;
                        margin: 20px 0;
                        padding: 15px;
                        background: ${primaryColor}20;
                        border-radius: 8px;
                    ">
                        <p style="font-size: 12px; margin: 0; color: ${primaryColor};">Time until celebration</p>
                        <div class="countdown" id="previewCountdown" style="
                            display: grid;
                            grid-template-columns: repeat(4, 1fr);
                            gap: 10px;
                            margin-top: 10px;
                        ">
                            <div style="text-align: center;">
                                <div style="font-size: 18px; font-weight: bold; color: ${primaryColor};">0</div>
                                <small>Days</small>
                            </div>
                            <div style="text-align: center;">
                                <div style="font-size: 18px; font-weight: bold; color: ${primaryColor};">0</div>
                                <small>Hours</small>
                            </div>
                            <div style="text-align: center;">
                                <div style="font-size: 18px; font-weight: bold; color: ${primaryColor};">0</div>
                                <small>Minutes</small>
                            </div>
                            <div style="text-align: center;">
                                <div style="font-size: 18px; font-weight: bold; color: ${primaryColor};">0</div>
                                <small>Seconds</small>
                            </div>
                        </div>
                    </div>
                `;
            }

            previewHTML += `
                    <div class="invitation-actions" style="
                        text-align: center;
                        margin-top: 30px;
                        padding-top: 20px;
                        border-top: 2px solid ${primaryColor}40;
                    ">
            `;

            if (googleMaps) {
                previewHTML += `
                    <button class="action-btn" style="
                        background: ${primaryColor};
                        color: white;
                        padding: 10px 20px;
                        border: none;
                        border-radius: 4px;
                        margin: 5px;
                        cursor: pointer;
                    ">
                        <i class="fa fa-map-marker"></i> View Location
                    </button>
                `;
            }

            if (whatsappRsvp) {
                previewHTML += `
                    <button class="action-btn whatsapp-btn" style="
                        background: #25D366;
                        color: white;
                        padding: 10px 20px;
                        border: none;
                        border-radius: 4px;
                        margin: 5px;
                        cursor: pointer;
                    ">
                        <i class="fa fa-whatsapp"></i> RSVP via WhatsApp
                    </button>
                `;
            }

            previewHTML += `
                    </div>
                </div>
            `;

            return previewHTML;
        }

        buildShareActions() {
            return `
                <div class="share-actions">
                    <h4>Share Your Invitation</h4>
                    <div class="share-buttons">
                        <button class="share-btn share-whatsapp" id="shareWhatsapp" title="Share on WhatsApp">
                            <i class="fa fa-whatsapp"></i> WhatsApp
                        </button>
                        <button class="share-btn share-facebook" id="shareFacebook" title="Share on Facebook">
                            <i class="fa fa-facebook"></i> Facebook
                        </button>
                        <button class="share-btn share-twitter" id="shareTwitter" title="Share on Twitter">
                            <i class="fa fa-twitter"></i> Twitter
                        </button>
                        <button class="share-btn share-download" id="downloadInvite" title="Download Invitation">
                            <i class="fa fa-download"></i> Download
                        </button>
                        <button class="share-btn share-email" id="emailInvite" title="Email Invitation">
                            <i class="fa fa-envelope"></i> Email
                        </button>
                    </div>
                </div>
            `;
        }

        applyStyles() {
            if (document.getElementById('builderStyles')) return;

            const style = document.createElement('style');
            style.id = 'builderStyles';
            style.textContent = `
                .wedding-builder-wrapper {
                    display: grid;
                    grid-template-columns: 350px 1fr;
                    gap: 20px;
                    padding: 20px;
                    background: #f9f9f9;
                    min-height: 100vh;
                    font-family: 'Open Sans', sans-serif;
                }

                .builder-sidebar {
                    overflow-y: auto;
                    max-height: 100vh;
                }

                .builder-section {
                    background: white;
                    padding: 20px;
                    margin-bottom: 20px;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                }

                .builder-section h3 {
                    margin: 0 0 15px 0;
                    font-size: 16px;
                    font-weight: 600;
                    color: #333;
                }

                .builder-section h3 i {
                    margin-right: 8px;
                    color: #d43f5e;
                }

                .theme-gallery {
                    display: grid;
                    grid-template-columns: 1fr;
                    gap: 12px;
                }

                .theme-card {
                    padding: 12px;
                    border: 2px solid #e0e0e0;
                    border-radius: 6px;
                    cursor: pointer;
                    transition: all 0.3s;
                }

                .theme-card:hover {
                    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                    transform: translateY(-2px);
                }

                .theme-card.active {
                    box-shadow: 0 0 8px rgba(212, 63, 94, 0.3);
                }

                .theme-thumbnail {
                    width: 100%;
                    height: 80px;
                    object-fit: cover;
                    border-radius: 4px;
                    margin-bottom: 8px;
                }

                .theme-card h4 {
                    margin: 8px 0 4px 0;
                    font-size: 14px;
                    font-weight: 600;
                }

                .theme-desc {
                    margin: 0;
                    font-size: 12px;
                    color: #999;
                }

                .form-group {
                    margin-bottom: 15px;
                }

                .form-group label {
                    display: block;
                    margin-bottom: 6px;
                    font-size: 13px;
                    font-weight: 500;
                    color: #333;
                }

                .form-control, .form-control-range {
                    width: 100%;
                    padding: 8px;
                    border: 1px solid #ddd;
                    border-radius: 4px;
                    font-size: 13px;
                    font-family: inherit;
                }

                .form-control:focus {
                    outline: none;
                    border-color: #d43f5e;
                    box-shadow: 0 0 4px rgba(212, 63, 94, 0.2);
                }

                .form-control-color {
                    padding: 6px;
                    height: 40px;
                    cursor: pointer;
                }

                .form-row {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 10px;
                }

                .form-row .col-6 {
                    flex: 1;
                }

                .feature-toggle {
                    margin-bottom: 12px;
                }

                .feature-toggle label {
                    display: flex;
                    align-items: center;
                    margin: 0;
                    cursor: pointer;
                    font-weight: 500;
                }

                .feature-toggle input[type="checkbox"] {
                    margin-right: 8px;
                    cursor: pointer;
                    accent-color: #d43f5e;
                }

                .builder-preview-section {
                    display: flex;
                    flex-direction: column;
                }

                .preview-controls {
                    background: white;
                    padding: 15px;
                    border-radius: 8px;
                    margin-bottom: 15px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                }

                .preview-mode-toggle {
                    display: flex;
                    gap: 10px;
                }

                .preview-btn {
                    padding: 8px 15px;
                    border: 1px solid #ddd;
                    background: white;
                    border-radius: 4px;
                    cursor: pointer;
                    transition: all 0.3s;
                    font-size: 13px;
                    font-weight: 500;
                }

                .preview-btn:hover {
                    border-color: #d43f5e;
                    color: #d43f5e;
                }

                .preview-btn.active {
                    background: #d43f5e;
                    color: white;
                    border-color: #d43f5e;
                }

                .preview-title {
                    font-weight: 600;
                    color: #333;
                }

                .preview-container {
                    flex: 1;
                    background: white;
                    border-radius: 8px;
                    padding: 20px;
                    overflow-y: auto;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                    margin-bottom: 15px;
                    display: flex;
                    justify-content: center;
                }

                .invitation-preview {
                    width: 100%;
                    max-width: 100%;
                    border-radius: 8px;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                    overflow: hidden;
                }

                .invitation-preview.mobile-view {
                    max-width: 360px;
                    aspect-ratio: 9/16;
                }

                .invitation-preview.desktop-view {
                    max-width: 700px;
                    aspect-ratio: auto;
                }

                .invitation-header {
                    padding: 30px 20px;
                    text-align: center;
                }

                .couple-names {
                    margin: 0 0 10px 0;
                }

                .invitation-subtitle {
                    margin: 0;
                    font-size: 14px;
                }

                .share-actions {
                    background: white;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                }

                .share-actions h4 {
                    margin: 0 0 15px 0;
                    font-size: 14px;
                    font-weight: 600;
                }

                .share-buttons {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
                    gap: 10px;
                }

                .share-btn {
                    padding: 10px;
                    border: 1px solid #ddd;
                    background: white;
                    border-radius: 4px;
                    cursor: pointer;
                    transition: all 0.3s;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    gap: 5px;
                    font-size: 12px;
                    font-weight: 500;
                }

                .share-btn:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                }

                .share-whatsapp { color: #25D366; }
                .share-facebook { color: #1877F2; }
                .share-twitter { color: #1DA1F2; }
                .share-download { color: #d43f5e; }
                .share-email { color: #666; }

                @media (max-width: 1024px) {
                    .wedding-builder-wrapper {
                        grid-template-columns: 1fr;
                    }

                    .builder-sidebar {
                        max-height: auto;
                    }

                    .builder-preview-section {
                        order: -1;
                    }
                }

                @media (max-width: 600px) {
                    .wedding-builder-wrapper {
                        padding: 10px;
                        gap: 10px;
                    }

                    .share-buttons {
                        grid-template-columns: repeat(2, 1fr);
                    }
                }
            `;

            document.head.appendChild(style);
        }

        // ====================================================================
        // EVENT LISTENERS
        // ====================================================================
        setupEventListeners() {
            // Theme selection
            document.querySelectorAll('.theme-card').forEach(card => {
                card.addEventListener('click', (e) => {
                    this.selectTheme(e.currentTarget.dataset.themeId);
                });
            });

            // Details editor
            document.getElementById('brideName')?.addEventListener('input', (e) => {
                this.data.couple.bride = e.target.value;
                this.updatePreview();
            });

            document.getElementById('groomName')?.addEventListener('input', (e) => {
                this.data.couple.groom = e.target.value;
                this.updatePreview();
            });

            document.getElementById('eventDate')?.addEventListener('change', (e) => {
                this.data.event.date = new Date(e.target.value);
                this.updatePreview();
            });

            document.getElementById('eventTime')?.addEventListener('change', (e) => {
                this.data.event.time = e.target.value;
                this.updatePreview();
            });

            document.getElementById('venue')?.addEventListener('input', (e) => {
                this.data.event.venue = e.target.value;
                this.updatePreview();
            });

            document.getElementById('city')?.addEventListener('input', (e) => {
                this.data.event.city = e.target.value;
                this.updatePreview();
            });

            document.getElementById('state')?.addEventListener('input', (e) => {
                this.data.event.state = e.target.value;
                this.updatePreview();
            });

            // Customization
            document.getElementById('primaryFont')?.addEventListener('change', (e) => {
                this.data.customization.primaryFont = e.target.value;
                this.updatePreview();
            });

            document.getElementById('accentFont')?.addEventListener('change', (e) => {
                this.data.customization.accentFont = e.target.value;
                this.updatePreview();
            });

            document.getElementById('headingSize')?.addEventListener('input', (e) => {
                this.data.customization.headingSize = parseInt(e.target.value);
                document.getElementById('headingSizeValue').textContent = e.target.value + 'px';
                this.updatePreview();
            });

            document.getElementById('bodySize')?.addEventListener('input', (e) => {
                this.data.customization.bodySize = parseInt(e.target.value);
                document.getElementById('bodySizeValue').textContent = e.target.value + 'px';
                this.updatePreview();
            });

            document.getElementById('primaryColor')?.addEventListener('input', (e) => {
                this.data.customization.primaryColor = e.target.value;
                this.updatePreview();
            });

            document.getElementById('secondaryColor')?.addEventListener('input', (e) => {
                this.data.customization.secondaryColor = e.target.value;
                this.updatePreview();
            });

            // Features toggle
            document.getElementById('featureCountdown')?.addEventListener('change', (e) => {
                this.data.features.countdown = e.target.checked;
                this.updatePreview();
            });

            document.getElementById('featureGoogleMaps')?.addEventListener('change', (e) => {
                this.data.features.googleMaps = e.target.checked;
                this.updatePreview();
            });

            document.getElementById('featureWhatsapp')?.addEventListener('change', (e) => {
                this.data.features.whatsappRsvp = e.target.checked;
                this.updatePreview();
            });

            document.getElementById('featureMusic')?.addEventListener('change', (e) => {
                this.data.features.backgroundMusic = e.target.checked;
                this.updatePreview();
            });

            // Preview mode
            document.querySelectorAll('.preview-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    this.setPreviewMode(e.currentTarget.dataset.mode);
                });
            });

            // Share actions
            document.getElementById('shareWhatsapp')?.addEventListener('click', () => {
                this.shareViaWhatsapp();
            });

            document.getElementById('shareFacebook')?.addEventListener('click', () => {
                this.shareViaFacebook();
            });

            document.getElementById('shareTwitter')?.addEventListener('click', () => {
                this.shareViaTwitter();
            });

            document.getElementById('downloadInvite')?.addEventListener('click', () => {
                this.downloadInvitation();
            });

            document.getElementById('emailInvite')?.addEventListener('click', () => {
                this.emailInvitation();
            });
        }

        selectTheme(themeId) {
            this.data.theme = themeId;
            document.querySelectorAll('.theme-card').forEach(card => {
                card.classList.remove('active');
            });
            document.querySelector(`[data-theme-id="${themeId}"]`).classList.add('active');
            this.updatePreview();
        }

        setPreviewMode(mode) {
            this.previewMode = mode;
            document.querySelectorAll('.preview-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.querySelector(`[data-mode="${mode}"]`).classList.add('active');
            this.updatePreview();
        }

        updatePreview() {
            const container = document.getElementById('previewContainer');
            if (!container) return;
            container.innerHTML = this.buildInvitationPreview();
        }

        // ====================================================================
        // SHARING & UTILITIES
        // ====================================================================
        shareViaWhatsapp() {
            const { bride, groom } = this.data.couple;
            const { date, venue, city } = this.data.event;
            const message = `🌹 ${bride} & ${groom} invite you to their wedding!\n\n📅 ${this.formatDateDisplay(date)}\n📍 ${venue}, ${city}\n\nVisit: ${window.location.href}`;
            const encoded = encodeURIComponent(message);
            window.open(`https://wa.me/?text=${encoded}`, '_blank');
        }

        shareViaFacebook() {
            const url = window.location.href;
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`, '_blank');
        }

        shareViaTwitter() {
            const { bride, groom } = this.data.couple;
            const text = `🌹 Check out ${bride} & ${groom}'s beautiful wedding invitation on InviteIndia!`;
            window.open(`https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(window.location.href)}`, '_blank');
        }

        downloadInvitation() {
            alert('Download feature coming soon! For now, use your browser\'s print or screenshot feature.');
        }

        emailInvitation() {
            const { bride, groom } = this.data.couple;
            const subject = `${bride} & ${groom}'s Wedding Invitation`;
            const body = `Join us for the wedding of ${bride} and ${groom}!\n\n${window.location.href}`;
            window.open(`mailto:?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`);
        }

        // ====================================================================
        // UTILITY FUNCTIONS
        // ====================================================================
        formatDateForInput(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        formatDateDisplay(date) {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            return date.toLocaleDateString('en-IN', options);
        }

        formatTime(time) {
            const [hours, minutes] = time.split(':');
            const hour = parseInt(hours);
            const period = hour >= 12 ? 'PM' : 'AM';
            const display = (hour % 12 || 12) + ':' + minutes + ' ' + period;
            return display;
        }
    }

    // ============================================================================
    // GLOBAL API
    // ============================================================================
    window.WeddingInvitationBuilder = WeddingInvitationBuilder;

})(window);
