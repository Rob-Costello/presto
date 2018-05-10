<?php
use Spatie\PdfToImage;

class jobsModel extends CI_Model
{

    function getJobs($where = null, $request = null, $limit = null, $offset = null)
    {

        $this->db->select('*, CONCAT(u.first_name, " ", u.last_name) AS createdBy, presto_jobs.id AS id ');
        $this->db->limit($limit, $offset);
        $this->db->join('presto_users u', 'u.id = presto_jobs.user_id');
        if( $where == null ) {
            $query = $this->db->get('presto_jobs');
            $count = $this->db->from('presto_jobs')->count_all_results();
        } else {
            $query = $this->db->get_where('presto_jobs', $where);
            $count = $this->db->from('presto_jobs')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);

    }

    function getJob($id)
    {

        $query = $this->db->get_where('presto_jobs', 'id = ' . $id);
        return $query->row();

    }

    function updateJob($data, $id)
    {

        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('presto_jobs', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();

    }

    function insertJob($data)
    {

        $this->db->insert('presto_jobs', $data);
        return $this->db->insert_id();

    }

    function deleteOffer($id)
    {

        $this->db->set('deleted', 1, FALSE);
        $this->db->where('id', $id, FALSE);
        $this->db->update('qph_offers');

    }

    function uploadArtwork($fileData, $jobID, $userID)
    {
        $data = array(
            'name' => $fileData['file_name'],
            'type' => $fileData['file_type'],
            'path' => $fileData['file_path'],
            'full_path' => $fileData['full_path'],
            'raw_name' => $fileData['raw_name'],
            'orig_name' => $fileData['orig_name'],
            'ext' => $fileData['file_ext'],
            'size' => $fileData['file_size'],
            'job_id' => $jobID,
            'user_id' => $userID
        );

        $this->db->insert('presto_jobs_artwork', $data);

        $pdf1 = new PdfToImage\Pdf($data['full_path']);
        $pdf1->setResolution(400)->saveImage($data['path'].'rendered/'.$data['raw_name'].'.jpg');
    }

    function getArtwork( $id ){

        $this->db->order_by('datetime', 'DESC');
        $this->db->join('presto_users', 'presto_users.id = presto_jobs_artwork.user_id');
        $query = $this->db->get_where('presto_jobs_artwork', 'job_id = ' . $id );
        return $query->result();

    }

    function getOutput( $id ){

        $this->db->order_by('datetime', 'DESC');
        $this->db->join('presto_users', 'presto_users.id = presto_jobs_outputs.user_id');
        $query = $this->db->get_where('presto_jobs_outputs', 'job_id = ' . $id );
        return $query->result();

    }

    function downloadOutputByID( $id ){

        $this->load->helper('download');
        $output = $this->getOutput($id);
        force_download($output[0]->full_path, NULL);

    }

    function uploadPath( $uploadsPath, $jobID ){

        $fullPath = $uploadsPath . $jobID . '/';

        if(!is_dir($fullPath)) {
            mkdir($fullPath);
            chmod($fullPath, 0777);
            mkdir($fullPath.'rendered/');
            chmod($fullPath.'rendered/', 0777);
            mkdir($fullPath.'outputs/');
            chmod($fullPath.'outputs/', 0777);
        }
        return $fullPath;

    }

    function output21Up( $pdfContent, $jobID, $jobName){

        $this->load->helper('download');
        $path = $this->uploadPath($this->config->item('upload_path'),$jobID );
        $pdfName = $jobName . '-' . date("Y-m-d h:i:sa") . '.pdf';
        $fullPath = $path.'outputs/'. $pdfName;

        file_put_contents($fullPath, $pdfContent);

        $data = array(
            'name' => $pdfName,
            'type' => 'application/pdf',
            'path' => $path.'outputs/',
            'full_path' => $fullPath,
            'ext' => '.pdf',
            'size' => filesize($fullPath),
            'job_id' => $jobID,
            'user_id' => $this->user->id
        );

        $this->db->insert('presto_jobs_outputs', $data);

        //force_download($this->config->item('upload_path').'organised-out.pdf', NULL);

    }

    function artworkToPDF($fileData){
//        $fileData['full_path'];
//        $pdf = new Spatie\PdfToImage\Pdf($pathToPdf);
//        $pdf->saveImage($pathToWhereImageShouldBeStored);
    }

}