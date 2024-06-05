public function debug() {
    if ($this->session) {
        echo "Session library loaded successfully!";
    } else {
        echo "Failed to load session library.";
    }
}