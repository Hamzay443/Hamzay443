// Constructor for Company Milestones
function Milestone(year, title, description) {
    this.year = year;
    this.title = title;
    this.description = description;
}

// Constructor for Contact Information
function ContactInfo(type, title, value, icon) {
    this.type = type;
    this.title = title;
    this.value = value;
    this.icon = icon;
}

// Initialize arrays with data
const milestones = [
    new Milestone(2015, "Founded", "The beginning of our journey to simplify car services."),
    new Milestone(2018, "Reached 10,000 Users", "A major milestone in building a trusted community."),
    new Milestone(2023, "Global Expansion", "Expanded our platform to serve customers worldwide.")
];

const contactDetails = [
    new ContactInfo("email", "Email Us", "KnightCreativity@gmail.com", "fas fa-envelope"),
    new ContactInfo("phone", "Call Us", "(+968) 95999959", "fas fa-phone-alt"),
    new ContactInfo("address", "Visit Us", "123 road street", "fas fa-map-marker-alt")
]; 