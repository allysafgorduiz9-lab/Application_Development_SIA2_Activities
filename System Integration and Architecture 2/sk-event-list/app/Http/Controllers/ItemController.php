<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $items = [
        [
            'id' => 1,
            'name' => 'Cybersecurity Awareness Program',
            'description' => 'NSTP-CWTS SLSU-Hinunangan Campus',
            'date' => 'Every Saturday',
            'category' => 'Educational',
            'venue' => 'Barangay Hall PD1',
            'image' => 'data:image/jpeg;base64,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'
        ],
        [
            'id' => 2,
            'name' => 'KK Assembly',
            'description' => 'After Cybersecurity Awareness Program',
            'date' => 'April 11, 2026',
            'category' => 'Assembly',
            'venue' => 'Barangay Hall PD1',
            'image' => 'https://thumbs.dreamstime.com/b/school-auditorium-filled-anticipation-as-students-eagerly-await-start-assembly-vector-illustration-320523644.jpg'
        ],
        [
            'id' => 3,
            'name' => 'One Day League Volleyball Boys',
            'description' => 'Barangay Sports Event',
            'date' => 'April 12, 2026',
            'category' => 'Sports',
            'venue' => 'Municipal Auditorium Hall',
            'image' => 'https://cdn1.sportngin.com/attachments/photo/492f-200777829/20220615-_DSC_4487_-163532_large.jpg'
        ],
        [
            'id' => 4,
            'name' => 'One Day League Volleyball Girls',
            'description' => 'Barangay Sports Event',
            'date' => 'April 19, 2026',
            'category' => 'Sports',
            'venue' => 'Municipal Auditorium Hall',
            'image' => 'https://excelvbc.com/wp-content/uploads/2022/05/16B_Eryca_AM0I2197-1024x683.jpg'
        ],
        [
            'id' => 5,
            'name' => 'Barangay Day',
            'description' => 'Community Celebration',
            'date' => 'April 25, 2026',
            'category' => 'Cultural',
            'venue' => 'Municipal Auditorium Hall',
            'image' => 'https://www.shutterstock.com/image-photo/filipino-barangay-hall-community-typical-260nw-2488599347.jpg'
        ],
        [
            'id' => 6,
            'name' => 'Basketball League Inter-Purok',
            'description' => 'Multi-day Tournament',
            'date' => 'April 13–24, 2026',
            'category' => 'Sports',
            'venue' => 'PD1 Covered Court Dryer',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQz91Yt38n0Cv28o1JIyVerms0vuWZXAFOuXQ&s'
        ],
        [
            'id' => 7,
            'name' => 'Mobile Legends Tournament',
            'description' => 'E-sports Competition',
            'date' => 'April 10, 17, and 24, 2026',
            'category' => 'E-sports',
            'venue' => 'Barangay Hall PD1',
            'image' => 'https://assets-prd.ignimgs.com/2023/09/30/mobilelegends-1696089976653.jpg?crop=1%3A1%2Csmart&format=jpg&auto=webp&quality=80'
        ],
    ];

    public function index()
    {
        return view('items.index', ['items' => $this->items]);
    }

    public function show($id)
    {
        $item = collect($this->items)->firstWhere('id', $id);

        if (!$item) {
            abort(404);
        }

        return view('items.show', ['item' => $item]);
    }
}