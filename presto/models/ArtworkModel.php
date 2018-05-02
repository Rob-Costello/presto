<?php
class artworkModel extends CI_Model
{

    function convertOneUpPDF( $pdfPath ){

        //$pdf1 = new \Spatie\PdfToImage\Pdf(dirname(__FILE__).'/pdfcards/1.pdf');
        $pdf = new Spatie\PdfToImage\Pdf( $pdfPath );
        $pdf->setResolution(400)->saveImage(dirname(__FILE__).'/pdfcards/1.jpg');
        $image = imagecreatefromstring(file_get_contents(dirname(__FILE__).'/pdfcards/1.jpg'));

    }

    function upload()
    {


        $this->load->library('upload', $config);

        if (!empty($_FILES)) {

            if (!$this->upload->do_upload('file-import')) {
                $errors = $this->upload->display_errors();

                $this->messages->set_error($errors);
            } else {
                $fileData = $this->upload->data();
                $message = $fileData['file_name'] . ' has been sucessfully uploaded';
                $this->messages->set_message($message);
                $this->load->model('feedsModel');
                $feed = new feedsModel();
                $feed->setFileImport($fileData, $this->input->post('override'), $this->user->id);

            }
        }

        $data['user'] = $this->user;
        $data['title'] = 'Import';
        $data['nav'] = 'feeds';
        $data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
        $this->load->view('pages/feeds_import', $data);
    }

    function getJobArtworkByID($ID){

        $this->db->select('*');
        $query = $this->db->get_where('presto_jobs_artwork', array('job_id' => $ID));
        $count = $this->db->from('presto_jobs_artwork')->where(array('job_id' => $ID))->count_all_results();
        return array('data' => $query->result(), 'count' => $count);

    }

}