<?php

namespace Database\Seeders;

use App\Models\Posting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Elegant Rose Gold Watch',
                'description' => 'A beautiful rose gold wristwatch with a slender bracelet. It was lost in the vicinity of the main library. The owner is sentimental about this watch, as it was a gift from their late grandmother. Reward offered for its return!',
                'image_url' => 'storage/sample/watch.jpeg',
                'type' => 'lost',
                'status' => 'PENDING',
                'user_id' => 1, // Assign user ID 1 to this posting
                'location' => 'Chennai',
                'messages' => [
                    [
                        'user_id' => 2, // User 2 is involved 
                        'body' => 'I found the watch.',

                    ],
                    [
                        'user_id' => 1, // User 2 is involved 
                        'body' => 'Great! Where can we meet?',

                    ],
                    // Add more messages for this posting
                ],
            ],
            [
                'title' => 'Found: DSLR Camera with Lens',
                'description' => 'A professional-grade DSLR camera with a black carrying case. This camera was found at the university\'s photography club meeting room. It seems to have been left behind after a workshop. Help us reunite this valuable equipment with its owner!',
                'image_url' => 'storage/sample/camera.jpeg',
                'type' => 'found',
                'status' => 'COMPLETED',
                'user_id' => 2, // Assign user ID 2 to this posting
                'location' => 'Chennai',
                'messages' => [
                    [
                        'user_id' => 1, // User 1 is involved 
                        'body' => 'Is the camera still available?'

                    ],
                    [
                        'user_id' => 2, // User 1 is involved 
                        'body' => 'Yes, it is. When can you pick it up?'

                    ],
                    [
                        'user_id' => 1, // User 1 is involved 
                        'body' => 'At the central station at 6PM'

                    ],
                    [
                        'user_id' => 2, // User 1 is involved 
                        'body' => 'That works for me. See you then!'

                    ]
                    // Add more messages for this posting
                ],
            ],
            [
                'title' => 'Lost: Red Pouch with External Hard Drive',
                'description' => 'A red protective pouch containing an external hard drive was lost in the computer science lab. The hard drive holds important research data. The owner is willing to offer a reward to anyone who finds and returns it.',
                'image_url' => 'storage/sample/harddrive.jpeg',
                'type' => 'lost',
                'status' => 'PENDING',
                'user_id' => 3, // Assign user ID 3 to this posting
                'location' => 'Bengaluru',
                'messages' => [
                    [
                        'user_id' => 4, // User 4 is involved 
                        'body' => 'I found the harddrive.'

                    ],
                    [
                        'user_id' => 3, // User 4 is involved 
                        'body' => 'Great! Where can we meet?'

                    ],
                    // Add more messages for this posting
                ],
            ],
            [
                'title' => 'Lost: Apple AirPods Pro',
                'description' => 'A set of Apple AirPods Pro was lost near the campus coffee shop. They are in a white charging case with a distinctive sticker. The owner misses the noise-canceling feature during study sessions. Reward available!',
                'image_url' => 'storage/sample/ear.jpeg',
                'type' => 'lost',
                'status' => 'PENDING',
                'user_id' => 4, // Assign user ID 4 to this posting
                'location' => 'Trichy',
                'messages' => [],
            ],
            [
                'title' => 'Found: Silver Necklace with Heart Pendant',
                'description' => 'A delicate silver necklace with a heart-shaped pendant was discovered in the campus garden. The owner may have lost it while enjoying a peaceful walk. Let\'s help return this sentimental piece of jewelry.',
                'image_url' => 'storage/sample/chainco.jpeg',
                'type' => 'found',
                'status' => 'PENDING',
                'user_id' => 5, // Assign user ID 5 to this posting
                'location' => 'Coimbatore',
                'messages' => [],
            ],
            [
                'title' => 'Lost: iPhone 12 (Black)',
                'description' => 'A black iPhone 12 with a clear phone case was lost near the sports complex. It has sentimental family photos that the owner is eager to recover. A reward is offered for its safe return.',
                'image_url' => 'storage/sample/iphone.jpeg',
                'type' => 'lost',
                'status' => 'PENDING',
                'user_id' => 1, // Assign user ID 1 to this posting
                'location' => 'Salem',

                'messages' => [],
            ],
            [
                'title' => 'Found: Travel Luggage Set',
                'description' => 'A trolley suitcase and a black backpack were left unattended at the university shuttle stop. These items appear to be packed for a trip. Help us locate the traveler who left them behind.',
                'image_url' => 'storage/sample/luggage.jpeg',
                'type' => 'found',
                'status' => 'PENDING',
                'location' => 'Karur',
                'user_id' => 2, // Assign user ID 2 to this posting
                'messages' => [],
            ],
            [
                'title' => 'Lost: Powerbank with Custom Decal',
                'description' => 'A portable power bank with a unique custom decal was left in the student lounge. The owner needs it to stay connected during classes. A reward is available for the finder.',
                'image_url' => 'storage/sample/powerb.jpeg',
                'type' => 'lost',
                'status' => 'PENDING',
                'location' => 'Erode',
                'user_id' => 3, // Assign user ID 3 to this posting
                'messages' => [],
            ],
            [
                'title' => 'Lost: Leather Purse with Money Inside',
                'description' => 'A brown leather purse containing cash and personal identification was misplaced in the campus cafeteria. The owner is deeply concerned about the loss of the money and is offering a reward for its return.',
                'image_url' => 'storage/sample/purse.jpeg',
                'type' => 'lost',
                'status' => 'PENDING',
                'user_id' => 4, // Assign user ID 4 to this posting
                'location' => 'Madurai',
                'messages' => [],
            ],
            [
                'title' => 'Lost: Precious Ring',
                'description' => 'A stunning ring was lost near the art studio. This ring has immense sentimental value as it was a family heirloom. The owner is devastated and willing to reward anyone who helps reunite them with it.',
                'image_url' => 'storage/sample/ring.jpeg',
                'type' => 'lost',
                'status' => 'PENDING',
                'user_id' => 5, // Assign user ID 5 to this posting
                'location' => 'Tirunelveli',
                'messages' => [],
            ],
            [
                'title' => 'Found: Samsung Galaxy Tablet',
                'description' => 'A Samsung Galaxy Tablet was found in one of the lecture halls. It appears to belong to a student who may have left it behind during a class. Let\'s get this valuable study tool back to its owner.',
                'image_url' => 'storage/sample/tab.jpeg',
                'type' => 'found',
                'status' => 'PENDING',
                'user_id' => 1, // Assign user ID 1 to this posting
                'location' => 'Delhi',
                'messages' => [],
            ],
            [
                'title' => 'Lost: Men\'s Luxury Watch',
                'description' => 'A high-end men\'s wristwatch was lost in the university gym. It has a classic design with a leather strap. The owner values this timepiece greatly and is offering a generous reward for its return.',
                'image_url' => 'storage/sample/watch2.jpeg',
                'type' => 'lost',
                'status' => 'PENDING',
                'user_id' => 2, // Assign user ID 2 to this posting
                'location' => 'Chennai',
                'messages' => [],
            ],
            // Add more items as needed
        ];

        foreach ($items as $item) {
            // Create the posting
            $posting = Posting::create([
                'title' => $item['title'],
                'description' => $item['description'],
                'image' => $item['image_url'],
                'type' => $item['type'],
                'status' => $item['status'],
                'user_id' => $item['user_id'],
                'location' => $item['location'],
            ]);

            // Create the messages for this posting
            foreach ($item['messages'] as $message) {
                $posting->messages()->create([
                    'user_id' => $message['user_id'],
                    'body' => $message['body'],
                ]);
            }
        }
    }
}
