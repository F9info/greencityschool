<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;
use Flash;

class TransactionController extends AppBaseController
{
    /** @var TransactionRepository $transactionRepository*/
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepo)
    {
        $this->transactionRepository = $transactionRepo;

        $this->middleware(['admin_permissions:add-transactions'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-transactions'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-transactions'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-transactions'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the Transaction.
     */
    public function index(Request $request)
    {
        $paymentMethods = PaymentMethod::all()->pluck('payment_method_name', 'id');

        $query = Transaction::query();
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('reference', 'LIKE', '%' . $search . "%")
                    ->orwhere('transaction_id', 'LIKE', '%' . $search . "%")
                    ->orwhere('amount', 'LIKE', '%' . $search . "%");
            });
        }
        if (!empty($request->payment_method)) {
            $query->where('payment_method_id', $request->payment_method);
        }
        if (!empty($request->payment_status)) {
            $query->where('payment_status', $request->payment_status);
        }
        if ($request->from_date != '') {
            $query->whereDate('transaction_date', '>=', date("Y-m-d", strtotime($request->from_date)));
        }
        if ($request->to_date != '') {
            $query->whereDate('transaction_date', '<=', date("Y-m-d", strtotime($request->to_date)));
        }
        $transactions = $query->latest()->paginate(10);

        return view('transactions.index', compact('paymentMethods', 'transactions'));
    }

    /**
     * Show the form for creating a new Transaction.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created Transaction in storage.
     */
    public function store(CreateTransactionRequest $request)
    {
        $input = $request->all();

        $transaction = $this->transactionRepository->create($input);

        Flash::success('Transaction saved successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Display the specified Transaction.
     */
    public function show($id)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.show')->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified Transaction.
     */
    public function edit($id)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.edit')->with('transaction', $transaction);
    }

    /**
     * Update the specified Transaction in storage.
     */
    public function update($id, UpdateTransactionRequest $request)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $transaction = $this->transactionRepository->update($request->all(), $id);

        Flash::success('Transaction updated successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Remove the specified Transaction from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $this->transactionRepository->delete($id);

        Flash::success('Transaction deleted successfully.');

        return redirect(route('transactions.index'));
    }
}
