export const PUBLISH_OPTS = [
    'publish_action',
    'publish_author',
    'publish_format',
    'publish_visibility',
    'publish_status',
    'publish_title',
    'publish_type',
];

export const PROMPT = { name: 'Prompt On Run', value: 'prompt_on_run' };

export const TYPES = [
    PROMPT,
    {'name': 'Post', 'value': 'post'},
    {'name': 'Page', 'value': 'page'}
];

export const TITLES = [
    {name: 'First H1', value: 'h1'},
    {name: 'First H2', value: 'h2'},
    {name: 'First H3', value: 'h3'},
    {name: 'First H4', value: 'h4'},
    {name: 'First H5', value: 'h5'},
    {name: 'First H6', value: 'h6'}
];

export const FORMATS = [
    PROMPT,
    {name: 'Standard', value: '0'},
    {name: 'Aside', value: 'aside'},
    {name: 'Image', value: 'image'},
    {name: 'Video', value: 'video'},
    {name: 'Quote', value: 'quote'},
    {name: 'Link', value: 'link'},
    {name: 'Gallery', value: 'gallery'},
    {name: 'Audio', value: 'audio'},
    {name: 'Chat', value: 'chat'},
    {name: 'Status', value: 'status'}
];

export const VISIBILITY = [
    PROMPT,
    {name: 'Public', value: 'public'},
    {name: 'Private', value: 'private'},
];

export const PUBLIC_STATUSES = [
    PROMPT,
    {name: 'Draft', value: 'draft'},
    {name: 'Pending Review', value: 'pending'},
    {name: 'Publish', value: 'publish'},
];

export const PRIVATE_STATUSES = [
    {name: 'Private Publish', value: 'private'}
];

export const ACTIONS = [
    {name: 'Create or Update Document', value: 'create_update'},
    // {name: 'Delete Post/Page', value: 'delete'}
];

export const AUTHORS = [
    {name: 'Current User', value: 'current_user'}
];

export const PUBLISHES = [
    {name: 'Immediately', value: 'immediately'},
];