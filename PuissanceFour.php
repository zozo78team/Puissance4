<?php 


class PuissanceFour {
    //On initie tout
	protected $_rows = 6;

	protected $_columns = 7;

	protected $_board_array = array();
	
	protected $_current_player = 0;

	protected $_moves = 0;
	//Le constructeur
	function __construct( $rows = 6, $cols = 6){

		$this->_setDimensions( $rows, $cols );

		$this->_initGame();
	}
    //On fait la board
	protected function _initializeGameBoard(){

		$_board_array = array();

		for($i = 0; $i < $this->getRows() ; $i ++ ){

			$_board_array[$i] = array();

			for($j = 0; $j < $this->getColumns() ; $j ++ ){

				$_board_array[$i][$j] = -1;

			}

		}

		$this->_setCurrentBoard($_board_array);

	}
	//On initialise la partie
	protected function _initGame(){

		$this->_initializeGameBoard();

		$this->_setCurrentPlayer(rand(1,2));

		$this->_dropPiece();

	}

	protected function _dropPiece(){

		if( $this->_moves >= ( $this->getRows() * $this->getColumns() )) {

			$this->_showNoWinnerMessage();

			return false;
		}

		$_target_col = rand(0, $this->getColumns()-1);
		$_current_board = $this->_getCurrentBoard();

		for( $row = $this->getRows()-1; $row>=0; $row-- ){

			if( $_current_board[$row][$_target_col] === -1 ){

				$_current_board[$row][$_target_col] = $this->_getCurrentPlayer();

				$this->_moves++;

				$this->_setCurrentBoard($_current_board);

				$this->_printBoard();

				//Check for winner
				if( $this->_checkForWinner( $row, $_target_col ) ){

					$this->_showWinnerMessage();

					return false;

				}else{

					$this->_togglePlayer();

					$this->_dropPiece();

				}

				return false;

			}

		}

		$this->_dropPiece();

	}
    //On affiche la board
	protected function _printBoard(){

		print '<p>Player '. $this->_getCurrentPlayer() .': Déplacement n°. ' . $this->_moves . '</p>';

		print '<table>';

		$_board_array = $this->_getCurrentBoard();

		for($i = 0; $i < $this->getRows() ; $i ++ ){

			print '<tr>';

			for($j = 0; $j < $this->getColumns() ; $j ++ ){

				$_class = "";

				if( $_board_array[$i][$j] === 1 ){
					$_class = "player-1";

				}else if( $_board_array[$i][$j] === 2 ){
					$_class = "player-2";

				}

				print '<td class="'.$_class.'" >' . $_board_array[$i][$j] . '</td>';

			}

			print '</tr>';

		}

		print '</table>';
	}
    //Le message de victoire
	protected function _showWinnerMessage(){

		print '<p class="message">Joueur ' . $this->_getCurrentPlayer() .' gagne la partie!</p>';

	}
    //Le cas ou personne ne gagne.
	protected function _showNoWinnerMessage(){

		print '<p class="message">Aucun gagnant.</p>';

	}

	protected function _togglePlayer(){

		$this->_setCurrentPlayer($this->_getCurrentPlayer()===1?2:1);

	}

	protected function _getCurrentPlayer(){

		return $this->_current_player;

	}

	protected function _setCurrentPlayer( $player_no ){

		$this->_current_player = $player_no;

	}

	protected function _getCurrentBoard(){

		return $this->_board_array;

	}

	protected function _setCurrentBoard( $board_array ){

		$this->_board_array = $board_array;

	}
	//On va vérifier si quelqu'un gagne avec l'horizontal et la vertical
	protected function _checkForWinner( $row, $col ){

		if($this->_horizontalCheck($row, $col)
				|| $this->_verticalCheck($row, $col)
		){
			return true;
		}

		return false;

	}

	private function _horizontalCheck( $row, $col ){

		$_board_array = $this->_getCurrentBoard();
		$_player = $_board_array[$row][$col];
		$_count = 0;

		for ( $i = $col; $i>=0; $i-- )
		{

			if( $_board_array[$row][$i] !== $_player ){

				break;

			}

			$_count++;

		}

		for ( $i = $col + 1; $i<$this->getColumns(); $i++ )
		{

			if( $_board_array[$row][$i] !== $_player ){

				break;

			}

			$_count++;

		}

		return $_count>=4 ? true : false;

	}

	private function _verticalCheck( $row, $col ){

		if ( $row >= $this->getRows()-3 ) {

			return false;

		}

		$_board_array = $this->_getCurrentBoard();
		$_player = $_board_array[$row][$col];

		for ( $i = $row + 1; $i <= $row + 3; $i++ ){

			if($_board_array[$i][$col] !== $_player){

				return false;

			}

		}

		return true;

	}
    //On met les dimensions
	protected function _setDimensions($rows = 6, $cols = 6){

		if(!isset($rows)) return;

		$this->setRows($rows);
		$this->setColumns($cols===null?$rows:$cols);

	}

	public function setRows($rows = 6){

		 $this->_rows = $rows;
	
	}

	public function getRows(){
		
		return $this->_rows;
		
	}

	public function setColumns($col = 6){
	
		$this->_columns = $col;
	
	}

	public function getColumns(){
	
		return $this->_columns;
	
	}
	
}
?>