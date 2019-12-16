<?php
 
// incidence list
$incidenceList = array(
    1 => array(
        'vertex' => 1, // vertex number
        'visited' => false, // `visited` flag
        'letter' => 'G', // vertex value
        'neighbours' => array(3, 4) // neighbours
    ),
    2 => array(
        'vertex' => 2,
        'visited' => false,
        'letter' => 'I',
        'neighbours' => array(4)
    ),
    3 => array(
        'vertex' => 3,
        'visited' => false,
        'letter' => 'A',
        'neighbours' => array(1, 4, 5)
    ),
    4 => array(
        'vertex' => 4,
        'visited' => false,
        'letter' => 'N',
        'neighbours' => array(1, 2, 3, 7)
    ),
    5 => array(
        'vertex' => 5,
        'visited' => false,
        'letter' => 'R',
        'neighbours' => array(3, 6, 7)
    ),
    6 => array(
        'vertex' => 6,
        'visited' => false,
        'letter' => 'L',
        'neighbours' => array(5, 8, 9)
    ),
    7 => array(
        'vertex' => 7,
        'visited' => false,
        'letter' => 'K',
        'neighbours' => array(4, 5, 9)
    ),
    8 => array(
        'vertex' => 8,
        'visited' => false,
        'letter' => 'N',
        'neighbours' => array(6, 10)
    ),
    9 => array(
        'vertex' => 9,
        'visited' => false,
        'letter' => 'V',
        'neighbours' => array(6, 7, 8)
    ),
    10 => array(
        'vertex' => 10,
        'visited' => false,
        'letter' => 'A',
        'neighbours' => array(8)
    ),
);
 
/**
 * Depth-first search of the graph
 * 
 * @param type $vertex Currently checked graph's vertex
 * @param type $list Incidence list of graph vertexes
 * @return Incidence list of graph vertexes
 */
function depthFirstSearch($vertex, $list)
{
    if (!$vertex['visited']) {
        echo $vertex['letter']; // output on screen
        // mark vertex as visited
        $list[$vertex['vertex']]['visited'] = true;
        foreach ($vertex['neighbours'] as $neighbour) {
            // Watch neighbours, which were not visited yet
            if (!$list[$neighbour]['visited']) {
                // going through neighbour-vertexes
                $list = depthFirstSearch(
                    $list[$neighbour], 
                    $list
                );
            }
        }
    }
     
    return $list;
}
 
function breadthFirstSearch($list)
{
    $queue = array();
    array_unshift($queue, $list[1]);
    $list[1]['visited'] = true;
     
    while (sizeof($queue)) {
        $vertex = array_pop($queue);
        echo $vertex['letter']; // output on screen
        foreach ($vertex['neighbours'] as $neighbour) {
            // Watch neighbours, which were not visited yet
            if (!$list[$neighbour]['visited']) {
                // mark vertex as visited
                $list[$neighbour]['visited'] = true;
                array_unshift($queue, $list[$neighbour]);
            }
        }
    }
}
 
// go through graph starting from 1st vertex
depthFirstSearch($incidenceList[1], $incidenceList);
echo "\n";
breadthFirstSearch($incidenceList);
?>